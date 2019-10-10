-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Okt 2019 pada 02.27
-- Versi server: 10.3.15-MariaDB-1
-- Versi PHP: 7.3.6-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `root_xxi_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ciri_gaya`
--

CREATE TABLE `tbl_ciri_gaya` (
  `id_ciri` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ciri_gaya`
--

INSERT INTO `tbl_ciri_gaya` (`id_ciri`, `nama`) VALUES
(31, '1. Mengingat'),
(32, '2. Menyukai'),
(33, '3. Memperhatikan'),
(34, '4. Menghafal'),
(35, '5. Berbicara'),
(36, '6. Tergangu'),
(37, '7. Tertarik'),
(38, '8. Menganalisa'),
(39, '9. Sulit'),
(40, '10. Suka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gaya_belajar`
--

CREATE TABLE `tbl_gaya_belajar` (
  `id_gaya` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `saran` text NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_gaya_belajar`
--

INSERT INTO `tbl_gaya_belajar` (`id_gaya`, `kode`, `nama`, `saran`, `keterangan`) VALUES
(3, 'G03', 'Gaya Belajar Kinestetik', '-', 'Model pembelajar kinestetik adalah pembelajar yang menyerap informasi melalui berbagai gerakan fisik. Ciri-ciri pembelajar kinestetik, di antaranya adalah:\r\n\r\n1. Selalu berorientasi fisik dan banyak bergerak \r\n2. Berbicara dengan perlahan \r\n3. Menanggapi perhatian fisik \r\n4. Suka menggunakan berbagai peralatan dan media \r\n5. Menyentuh orang untuk mendapatkan perhatian mereka \r\n6. Berdiri dekat ketika berbicara dengan orang \r\n7. Mempunyai perkembangan awal otot-otot yang besar \r\n8. Belajar melalui praktek\r\n9. Menghafal dengan cara berjalan dan melihat \r\n10. Menggunakan jari sebagai penunjuk ketika membaca \r\n11. Banyak menggunakan isyarat tubuh \r\n12. Tidak dapat duduk diam untuk waktu lama \r\n13. Menggunakan kata-kata yang menandung akso \r\n14. Menyukai buku-buku yang berorientasi pada cerita \r\n15. Kemungkinan tulisannya jelek \r\n16. Ingin melakukan segala sesuatu \r\n17. Menyukai permainan dan olah raga.'),
(4, 'G02', 'Gaya Belajar Auditorial', '-', 'Model pembelajar auditory adalah model di mana seseorang lebih cepat menyerap informasi melalui apa yang ia dengarkan. Penjelasan tertulis akan lebih mudah ditangkap oleh para pembelajar auditory ini. Ciri-ciri orang-orang auditorial, di antaranya adalah:\r\n\r\n1. Lebih cepat menyerap dengan mendengarkan \r\n2. Menggerakkan bibir mereka dan mengucapkan tulisan di buku ketika membaca \r\n3. Senang membaca dengan keras dan mendengarkan \r\n4. Dapat mengulangi kembali dan menirukan nada, birama, dan warna suara. \r\n5. Bagus dalam berbicara dan bercerita \r\n6. Berbicara dengan irama yang terpola \r\n7. Belajar dengan mendengarkan dan mengingat apa yang didiskusikan daripada yang dilihat \r\n8. Suka berbicara, suka berdiskusi, dan menjelaskan sesuatu panjang lebar \r\n9. Lebih pandai mengeja dengan keras daripada menuliskannya \r\n10. Suka musik dan bernyanyi \r\n11. Tidak bisa diam dalam waktu lama \r\n12. Suka mengerjakan tugas kelompok'),
(5, 'G01', 'Gaya Belajar Visual', '-', 'Modalitas ini menyerap citra terkait dengan visual, warna, gambar, peta, diagram. Model pembelajar visual menyerap informasi dan belajar dari apa yang dilihat oleh mata. Beberapa ciri dari pembelajar visual di antaranya adalah:\r\n\r\n1. Mengingat apa yang dilihat, daripada yang didengar.\r\n2. Suka mencoret-coret sesuatu, yang terkadang tanpa ada artinya saat di dalam kelas \r\n3. Pembaca cepat dan tekun \r\n4. Lebih suka membaca daripada dibacakan \r\n5. Rapi dan teratur \r\n6. Mementingkan penampilan, dalam hal pakaian ataupun penampilan keseluruhan \r\n7. Teliti terhadap detail \r\n8. Pengeja yang baik \r\n9. Lebih memahami gambar dan bagan daripada instruksi tertulis ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(19, 1, 3),
(21, 2, 1),
(24, 1, 9),
(28, 2, 3),
(29, 2, 2),
(30, 1, 2),
(31, 1, 12),
(32, 2, 12),
(33, 1, 10),
(34, 2, 10),
(35, 2, 13),
(36, 1, 13),
(37, 1, 14),
(38, 2, 14),
(39, 1, 15),
(40, 2, 15),
(41, 1, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `id_gaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`id_hasil`, `id_peserta`, `id_gaya`) VALUES
(3, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama`) VALUES
(1, 'KELAS 9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `urut` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `urut`, `is_aktif`) VALUES
(1, 'Dashboard', 'admin/', 'fa fa-dashboard', 0, 1, 'y'),
(2, 'KELOLA ADMIN', 'admin/user', 'fa fa-user-o', 0, 6, 'y'),
(3, 'LEVEL PENGGUNA', 'admin/userlevel', 'fa fa-users', 0, 8, 'y'),
(10, 'KATEGORI GAYA BELAJAR', 'admin/gayabelajar', 'fa fa-book', 0, 3, 'y'),
(12, 'KELOLA MENU', 'admin/kelolamenu', 'fa fa-server', 0, 7, 'y'),
(13, 'CIRI2 GAYA BELAJAR', 'admin/cirigaya', 'fa fa-book', 0, 3, 'y'),
(14, 'KELAS', 'admin/kelas', 'fa fa-suitcase', 0, 5, 'y'),
(15, 'PESERTA', 'admin/peserta', 'fa fa-address-card-o', 0, 4, 'y'),
(16, 'HASIL TEST', 'admin/hasil', 'fa fa-edit', 0, 2, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`id_peserta`, `id_kelas`, `nama`, `email`, `password`) VALUES
(2, 1, 'Mha Mhank', 'nim4n5541@gmail.com', '$2y$04$SA3jnrmL.SQIMWKzCIzGK.klw8Hzt.PIsf/1c7E9Z0kIfRLO8Xk/K');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_soal_ciri`
--

CREATE TABLE `tbl_soal_ciri` (
  `id_ciri_soal` int(11) NOT NULL,
  `id_ciri` int(11) DEFAULT NULL,
  `id_gaya` int(11) DEFAULT NULL,
  `kode` varchar(255) NOT NULL,
  `soal` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_soal_ciri`
--

INSERT INTO `tbl_soal_ciri` (`id_ciri_soal`, `id_ciri`, `id_gaya`, `kode`, `soal`, `gambar`) VALUES
(4, 1, 5, 'A1-VISUAL', 'INI VISUAL', NULL),
(5, 1, 4, 'A2-AUD', 'INI AUDITORIAL', NULL),
(6, 1, 3, 'A3-KIN', 'ini kinestik', NULL),
(70, 31, 5, 'C01', 'Mudah mengingat yang dilihat', NULL),
(71, 31, 4, 'C02', 'Mudah mengingat hal yang dilakukan', NULL),
(72, 31, 3, 'C03', 'Mudah mengingat hal yang didengar', NULL),
(73, 32, 5, 'C04', 'Sangat menyukai lukisan', NULL),
(74, 32, 4, 'C05', ' Sangat menyukai tarian', NULL),
(75, 32, 3, 'C06', 'Sangat menyukai musik', NULL),
(76, 33, 5, 'C07', 'Cenderung memperhatikan orang pada wajah dan pakaian yang di kenakan', NULL),
(77, 33, 4, 'C08', 'Cenderung memperhatikan orang pada perilaku dan gerak geriknya', NULL),
(78, 33, 3, 'C09', 'Cenderung memperhatikan orang pada pembiacaraan', NULL),
(79, 34, 5, 'C10', 'Senang menghafal sesuatu dengan mengulangi kata-kata dengan suara keras', NULL),
(80, 34, 4, 'C11', 'Senang menghafal sesuatu dengan menulis', NULL),
(81, 34, 3, 'C12', 'Senang menghafal sesuatu dengan berjalan', NULL),
(82, 35, 5, 'C13', 'Dalam berbicara menjelaskan, cenderung menggerakan tangan', NULL),
(83, 35, 4, 'C14', 'Dalam berbicara menjelaskan, cenderung menyampaikan secara lisan', NULL),
(84, 35, 3, 'C15', 'Dalam berbicara menjelaskan, cenderung membuat coretan di kertas', NULL),
(85, 36, 5, 'C16', 'Mudah tergangu dengan benda yang bergerak', NULL),
(86, 36, 4, 'C17', 'Mudah tergangu dengan barang-barang berantakan disekitarnya', NULL),
(87, 36, 3, 'C18', 'Mudah tergangu suara yang berisik', NULL),
(88, 37, 5, 'C19', 'Sangat tertarik pada gerakan tubuh', NULL),
(89, 37, 4, 'C20', 'Sangat tertarik pada suara', NULL),
(90, 37, 3, 'C21', 'Sangat tertarik pada warna', NULL),
(91, 38, 5, 'C22', 'Menganalisa sesuatu dengan membayangkan sesuatu diotak', NULL),
(92, 38, 4, 'C23', 'Menganalisa sesuatu dengan berulang-ulang', NULL),
(93, 38, 3, 'C24', 'Menganalisa sesuatu dengan membuat coretan', NULL),
(94, 39, 5, 'C25', 'Sulit konsentrasi ketika ada keributan', NULL),
(95, 39, 4, 'C26', 'Sulit bisa berlama belajar jika bahan pelajaran penuh tulisan atau tidak rapih', NULL),
(96, 39, 3, 'C27', 'Sulit untuk bisa duduk diam dan tenang', NULL),
(97, 40, 5, 'C28', 'Suka diajari oleh guru dengan cara menggambarkan sesuatu objek di papan tulis', NULL),
(98, 40, 4, 'C29', 'Suka diajari oleh guru dengan cara memperaktikkan dan menyentuh objek yang dibicarakan', NULL),
(99, 40, 3, 'C30', 'Suka di ajari oleh guru dengan cara menjelaskan dengan suara indah', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_ciri_gaya`
--
ALTER TABLE `tbl_ciri_gaya`
  ADD PRIMARY KEY (`id_ciri`);

--
-- Indeks untuk tabel `tbl_gaya_belajar`
--
ALTER TABLE `tbl_gaya_belajar`
  ADD PRIMARY KEY (`id_gaya`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_soal_ciri`
--
ALTER TABLE `tbl_soal_ciri`
  ADD PRIMARY KEY (`id_ciri_soal`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_ciri_gaya`
--
ALTER TABLE `tbl_ciri_gaya`
  MODIFY `id_ciri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_gaya_belajar`
--
ALTER TABLE `tbl_gaya_belajar`
  MODIFY `id_gaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_soal_ciri`
--
ALTER TABLE `tbl_soal_ciri`
  MODIFY `id_ciri_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
