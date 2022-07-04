-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 05.44
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edupen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_permintaan`
--

CREATE TABLE `detail_permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_permintaan`
--

INSERT INTO `detail_permintaan` (`id_permintaan`, `id_penulis`) VALUES
(4, 4),
(5, 4),
(6, 4),
(7, 3),
(8, 3),
(9, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback_karya`
--

CREATE TABLE `feedback_karya` (
  `id_feedback` int(11) NOT NULL,
  `id_karya` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback_karya`
--

INSERT INTO `feedback_karya` (`id_feedback`, `id_karya`, `feedback`) VALUES
(1, 1, '<p>Baguss Sekalii</p>\r\n'),
(2, 2, '<p>Indahhh</p>\r\n'),
(3, 1, '<p>format benar</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_karya`
--

CREATE TABLE `jenis_karya` (
  `id_jeniskarya` int(11) NOT NULL,
  `nama_jeniskarya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_karya`
--

INSERT INTO `jenis_karya` (`id_jeniskarya`, `nama_jeniskarya`) VALUES
(1, 'private'),
(2, 'public'),
(3, 'request');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tulisan`
--

CREATE TABLE `jenis_tulisan` (
  `id_jenistulisan` int(11) NOT NULL,
  `nama_jenistulisan` varchar(50) NOT NULL,
  `cover` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_tulisan`
--

INSERT INTO `jenis_tulisan` (`id_jenistulisan`, `nama_jenistulisan`, `cover`) VALUES
(1, 'Cerpen', '1.png'),
(2, 'Artikel Ilmiah', '2.png'),
(3, 'Essay', '3.png'),
(4, 'Artikel Opini', '4.png'),
(5, 'Puisi', '5.png'),
(6, 'Pantun', '6.png'),
(7, 'Cerita Anak', '7.png'),
(8, 'Fiksi Historis', '8.png'),
(9, 'Lainnya', '9.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karya`
--

CREATE TABLE `karya` (
  `id_karya` int(11) NOT NULL,
  `id_jenistulisan` int(11) NOT NULL,
  `id_jeniskarya` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tulisan` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karya`
--

INSERT INTO `karya` (`id_karya`, `id_jenistulisan`, `id_jeniskarya`, `id_penulis`, `judul`, `tulisan`, `tgl_upload`, `gambar`) VALUES
(1, 1, 1, 3, 'Menanti Rindu Langit', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis efficitur lacus eget tempus. Ut placerat libero sed lacus rutrum sagittis. Praesent in scelerisque purus. Curabitur quis ultrices tellus. Suspendisse finibus sapien facilisis aliquet maximus. Quisque vel nunc ut magna iaculis pharetra. Nam blandit urna erat, imperdiet imperdiet purus convallis a. Donec egestas et neque id blandit. Nulla sit amet ultricies enim. Etiam feugiat maximus neque a lacinia. Proin rutrum convallis dui. Nulla facilisi. Mauris tempus scelerisque sem, ac sagittis dui rhoncus sit amet. Fusce mattis ornare sem vestibulum viverra. Sed placerat venenatis pellentesque.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas finibus accumsan elit vel pellentesque. Nunc nec nisi nec massa feugiat fermentum sed ac erat. Nullam interdum metus nec orci tincidunt accumsan. Maecenas purus tortor, tincidunt eget venenatis ut, euismod eu ligula. Praesent venenatis erat eu mauris consectetur elementum. Pellentesque ut ipsum lectus.</p>\r\n\r\n<p>Quisque faucibus diam neque, euismod mattis neque dictum eu. Integer dolor erat, rhoncus ac diam sed, sodales posuere tellus. Nulla eu sodales diam. Integer nunc nibh, venenatis et finibus vitae, viverra sed dui. Ut ut convallis metus, nec posuere libero. Curabitur at felis ac sapien vestibulum auctor consequat in mi. Vivamus vehicula auctor magna eget condimentum. Pellentesque feugiat nisi quis lorem pretium pretium. Fusce eget ornare ligula. Nunc tristique lacus lorem, eu pretium ante placerat a. Quisque bibendum ex ac pellentesque venenatis. Proin auctor, risus vel dictum venenatis, lorem purus imperdiet nisl, et interdum turpis magna et magna. Pellentesque accumsan leo magna, a molestie turpis posuere id. Maecenas elementum, eros ac semper gravida, massa eros finibus velit, vel suscipit justo libero eget enim. Morbi eu tincidunt massa, placerat porta mi. Nunc orci nisl, ultricies non diam accumsan, cursus tincidunt diam.</p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras venenatis tristique enim non posuere. In vitae pulvinar dui, a consectetur neque. Sed imperdiet turpis et quam hendrerit interdum. Proin porta tellus nec tellus condimentum, at volutpat ligula varius. Aliquam pretium mauris vel tortor interdum, in porttitor mi interdum. Duis consequat sed purus nec egestas.</p>\r\n\r\n<p>Nunc vel vehicula ipsum, vel elementum neque. Donec efficitur tempus augue ac scelerisque. Aenean elementum non neque non congue. Duis mollis commodo mauris, eu rutrum lacus ullamcorper a. Proin vestibulum, sem et tincidunt imperdiet, justo augue consequat eros, facilisis cursus ipsum tellus id nisl. Pellentesque blandit neque nec nisi tincidunt finibus. Nullam vitae tellus egestas, ultrices ligula vel, auctor dui. Praesent rhoncus imperdiet tristique.</p>\r\n', '2022-07-03', '62c181d0b2bd3.jpg'),
(2, 8, 2, 4, 'Sebatas Mimpi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis efficitur lacus eget tempus. Ut placerat libero sed lacus rutrum sagittis. Praesent in scelerisque purus. Curabitur quis ultrices tellus. Suspendisse finibus sapien facilisis aliquet maximus. Quisque vel nunc ut magna iaculis pharetra. Nam blandit urna erat, imperdiet imperdiet purus convallis a. Donec egestas et neque id blandit. Nulla sit amet ultricies enim. Etiam feugiat maximus neque a lacinia. Proin rutrum convallis dui. Nulla facilisi. Mauris tempus scelerisque sem, ac sagittis dui rhoncus sit amet. Fusce mattis ornare sem vestibulum viverra. Sed placerat venenatis pellentesque.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas finibus accumsan elit vel pellentesque. Nunc nec nisi nec massa feugiat fermentum sed ac erat. Nullam interdum metus nec orci tincidunt accumsan. Maecenas purus tortor, tincidunt eget venenatis ut, euismod eu ligula. Praesent venenatis erat eu mauris consectetur elementum. Pellentesque ut ipsum lectus.</p>\r\n\r\n<p>Quisque faucibus diam neque, euismod mattis neque dictum eu. Integer dolor erat, rhoncus ac diam sed, sodales posuere tellus. Nulla eu sodales diam. Integer nunc nibh, venenatis et finibus vitae, viverra sed dui. Ut ut convallis metus, nec posuere libero. Curabitur at felis ac sapien vestibulum auctor consequat in mi. Vivamus vehicula auctor magna eget condimentum. Pellentesque feugiat nisi quis lorem pretium pretium. Fusce eget ornare ligula. Nunc tristique lacus lorem, eu pretium ante placerat a. Quisque bibendum ex ac pellentesque venenatis. Proin auctor, risus vel dictum venenatis, lorem purus imperdiet nisl, et interdum turpis magna et magna. Pellentesque accumsan leo magna, a molestie turpis posuere id. Maecenas elementum, eros ac semper gravida, massa eros finibus velit, vel suscipit justo libero eget enim. Morbi eu tincidunt massa, placerat porta mi. Nunc orci nisl, ultricies non diam accumsan, cursus tincidunt diam.</p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras venenatis tristique enim non posuere. In vitae pulvinar dui, a consectetur neque. Sed imperdiet turpis et quam hendrerit interdum. Proin porta tellus nec tellus condimentum, at volutpat ligula varius. Aliquam pretium mauris vel tortor interdum, in porttitor mi interdum. Duis consequat sed purus nec egestas.</p>\r\n\r\n<p>Nunc vel vehicula ipsum, vel elementum neque. Donec efficitur tempus augue ac scelerisque. Aenean elementum non neque non congue. Duis mollis commodo mauris, eu rutrum lacus ullamcorper a. Proin vestibulum, sem et tincidunt imperdiet, justo augue consequat eros, facilisis cursus ipsum tellus id nisl. Pellentesque blandit neque nec nisi tincidunt finibus. Nullam vitae tellus egestas, ultrices ligula vel, auctor dui. Praesent rhoncus imperdiet tristique.</p>\r\n', '2022-07-03', '62c181f0b5a7b.jpg'),
(3, 1, 2, 4, 'Gadis Daun Jeruk', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis efficitur lacus eget tempus. Ut placerat libero sed lacus rutrum sagittis. Praesent in scelerisque purus. Curabitur quis ultrices tellus. Suspendisse finibus sapien facilisis aliquet maximus. Quisque vel nunc ut magna iaculis pharetra. Nam blandit urna erat, imperdiet imperdiet purus convallis a. Donec egestas et neque id blandit. Nulla sit amet ultricies enim. Etiam feugiat maximus neque a lacinia. Proin rutrum convallis dui. Nulla facilisi. Mauris tempus scelerisque sem, ac sagittis dui rhoncus sit amet. Fusce mattis ornare sem vestibulum viverra. Sed placerat venenatis pellentesque.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas finibus accumsan elit vel pellentesque. Nunc nec nisi nec massa feugiat fermentum sed ac erat. Nullam interdum metus nec orci tincidunt accumsan. Maecenas purus tortor, tincidunt eget venenatis ut, euismod eu ligula. Praesent venenatis erat eu mauris consectetur elementum. Pellentesque ut ipsum lectus.</p>\r\n\r\n<p>Quisque faucibus diam neque, euismod mattis neque dictum eu. Integer dolor erat, rhoncus ac diam sed, sodales posuere tellus. Nulla eu sodales diam. Integer nunc nibh, venenatis et finibus vitae, viverra sed dui. Ut ut convallis metus, nec posuere libero. Curabitur at felis ac sapien vestibulum auctor consequat in mi. Vivamus vehicula auctor magna eget condimentum. Pellentesque feugiat nisi quis lorem pretium pretium. Fusce eget ornare ligula. Nunc tristique lacus lorem, eu pretium ante placerat a. Quisque bibendum ex ac pellentesque venenatis. Proin auctor, risus vel dictum venenatis, lorem purus imperdiet nisl, et interdum turpis magna et magna. Pellentesque accumsan leo magna, a molestie turpis posuere id. Maecenas elementum, eros ac semper gravida, massa eros finibus velit, vel suscipit justo libero eget enim. Morbi eu tincidunt massa, placerat porta mi. Nunc orci nisl, ultricies non diam accumsan, cursus tincidunt diam.</p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras venenatis tristique enim non posuere. In vitae pulvinar dui, a consectetur neque. Sed imperdiet turpis et quam hendrerit interdum. Proin porta tellus nec tellus condimentum, at volutpat ligula varius. Aliquam pretium mauris vel tortor interdum, in porttitor mi interdum. Duis consequat sed purus nec egestas.</p>\r\n\r\n<p>Nunc vel vehicula ipsum, vel elementum neque. Donec efficitur tempus augue ac scelerisque. Aenean elementum non neque non congue. Duis mollis commodo mauris, eu rutrum lacus ullamcorper a. Proin vestibulum, sem et tincidunt imperdiet, justo augue consequat eros, facilisis cursus ipsum tellus id nisl. Pellentesque blandit neque nec nisi tincidunt finibus. Nullam vitae tellus egestas, ultrices ligula vel, auctor dui. Praesent rhoncus imperdiet tristique.</p>\r\n', '2022-07-03', '62c1820f3dbe2.jpg'),
(4, 1, 2, 4, 'Pulang', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis efficitur lacus eget tempus. Ut placerat libero sed lacus rutrum sagittis. Praesent in scelerisque purus. Curabitur quis ultrices tellus. Suspendisse finibus sapien facilisis aliquet maximus. Quisque vel nunc ut magna iaculis pharetra. Nam blandit urna erat, imperdiet imperdiet purus convallis a. Donec egestas et neque id blandit. Nulla sit amet ultricies enim. Etiam feugiat maximus neque a lacinia. Proin rutrum convallis dui. Nulla facilisi. Mauris tempus scelerisque sem, ac sagittis dui rhoncus sit amet. Fusce mattis ornare sem vestibulum viverra. Sed placerat venenatis pellentesque.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas finibus accumsan elit vel pellentesque. Nunc nec nisi nec massa feugiat fermentum sed ac erat. Nullam interdum metus nec orci tincidunt accumsan. Maecenas purus tortor, tincidunt eget venenatis ut, euismod eu ligula. Praesent venenatis erat eu mauris consectetur elementum. Pellentesque ut ipsum lectus.</p>\r\n\r\n<p>Quisque faucibus diam neque, euismod mattis neque dictum eu. Integer dolor erat, rhoncus ac diam sed, sodales posuere tellus. Nulla eu sodales diam. Integer nunc nibh, venenatis et finibus vitae, viverra sed dui. Ut ut convallis metus, nec posuere libero. Curabitur at felis ac sapien vestibulum auctor consequat in mi. Vivamus vehicula auctor magna eget condimentum. Pellentesque feugiat nisi quis lorem pretium pretium. Fusce eget ornare ligula. Nunc tristique lacus lorem, eu pretium ante placerat a. Quisque bibendum ex ac pellentesque venenatis. Proin auctor, risus vel dictum venenatis, lorem purus imperdiet nisl, et interdum turpis magna et magna. Pellentesque accumsan leo magna, a molestie turpis posuere id. Maecenas elementum, eros ac semper gravida, massa eros finibus velit, vel suscipit justo libero eget enim. Morbi eu tincidunt massa, placerat porta mi. Nunc orci nisl, ultricies non diam accumsan, cursus tincidunt diam.</p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras venenatis tristique enim non posuere. In vitae pulvinar dui, a consectetur neque. Sed imperdiet turpis et quam hendrerit interdum. Proin porta tellus nec tellus condimentum, at volutpat ligula varius. Aliquam pretium mauris vel tortor interdum, in porttitor mi interdum. Duis consequat sed purus nec egestas.</p>\r\n\r\n<p>Nunc vel vehicula ipsum, vel elementum neque. Donec efficitur tempus augue ac scelerisque. Aenean elementum non neque non congue. Duis mollis commodo mauris, eu rutrum lacus ullamcorper a. Proin vestibulum, sem et tincidunt imperdiet, justo augue consequat eros, facilisis cursus ipsum tellus id nisl. Pellentesque blandit neque nec nisi tincidunt finibus. Nullam vitae tellus egestas, ultrices ligula vel, auctor dui. Praesent rhoncus imperdiet tristique.</p>\r\n', '2022-07-03', '62c18225de0d7.jpg'),
(5, 8, 2, 4, 'Izinkan Perempuan Bicara', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis efficitur lacus eget tempus. Ut placerat libero sed lacus rutrum sagittis. Praesent in scelerisque purus. Curabitur quis ultrices tellus. Suspendisse finibus sapien facilisis aliquet maximus. Quisque vel nunc ut magna iaculis pharetra. Nam blandit urna erat, imperdiet imperdiet purus convallis a. Donec egestas et neque id blandit. Nulla sit amet ultricies enim. Etiam feugiat maximus neque a lacinia. Proin rutrum convallis dui. Nulla facilisi. Mauris tempus scelerisque sem, ac sagittis dui rhoncus sit amet. Fusce mattis ornare sem vestibulum viverra. Sed placerat venenatis pellentesque.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas finibus accumsan elit vel pellentesque. Nunc nec nisi nec massa feugiat fermentum sed ac erat. Nullam interdum metus nec orci tincidunt accumsan. Maecenas purus tortor, tincidunt eget venenatis ut, euismod eu ligula. Praesent venenatis erat eu mauris consectetur elementum. Pellentesque ut ipsum lectus.</p>\r\n\r\n<p>Quisque faucibus diam neque, euismod mattis neque dictum eu. Integer dolor erat, rhoncus ac diam sed, sodales posuere tellus. Nulla eu sodales diam. Integer nunc nibh, venenatis et finibus vitae, viverra sed dui. Ut ut convallis metus, nec posuere libero. Curabitur at felis ac sapien vestibulum auctor consequat in mi. Vivamus vehicula auctor magna eget condimentum. Pellentesque feugiat nisi quis lorem pretium pretium. Fusce eget ornare ligula. Nunc tristique lacus lorem, eu pretium ante placerat a. Quisque bibendum ex ac pellentesque venenatis. Proin auctor, risus vel dictum venenatis, lorem purus imperdiet nisl, et interdum turpis magna et magna. Pellentesque accumsan leo magna, a molestie turpis posuere id. Maecenas elementum, eros ac semper gravida, massa eros finibus velit, vel suscipit justo libero eget enim. Morbi eu tincidunt massa, placerat porta mi. Nunc orci nisl, ultricies non diam accumsan, cursus tincidunt diam.</p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras venenatis tristique enim non posuere. In vitae pulvinar dui, a consectetur neque. Sed imperdiet turpis et quam hendrerit interdum. Proin porta tellus nec tellus condimentum, at volutpat ligula varius. Aliquam pretium mauris vel tortor interdum, in porttitor mi interdum. Duis consequat sed purus nec egestas.</p>\r\n\r\n<p>Nunc vel vehicula ipsum, vel elementum neque. Donec efficitur tempus augue ac scelerisque. Aenean elementum non neque non congue. Duis mollis commodo mauris, eu rutrum lacus ullamcorper a. Proin vestibulum, sem et tincidunt imperdiet, justo augue consequat eros, facilisis cursus ipsum tellus id nisl. Pellentesque blandit neque nec nisi tincidunt finibus. Nullam vitae tellus egestas, ultrices ligula vel, auctor dui. Praesent rhoncus imperdiet tristique.</p>\r\n', '2022-07-03', '62c182487d07f.jpg'),
(6, 1, 1, 3, 'Dunia di Dalam Mata', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis efficitur lacus eget tempus. Ut placerat libero sed lacus rutrum sagittis. Praesent in scelerisque purus. Curabitur quis ultrices tellus. Suspendisse finibus sapien facilisis aliquet maximus. Quisque vel nunc ut magna iaculis pharetra. Nam blandit urna erat, imperdiet imperdiet purus convallis a. Donec egestas et neque id blandit. Nulla sit amet ultricies enim. Etiam feugiat maximus neque a lacinia. Proin rutrum convallis dui. Nulla facilisi. Mauris tempus scelerisque sem, ac sagittis dui rhoncus sit amet. Fusce mattis ornare sem vestibulum viverra. Sed placerat venenatis pellentesque.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas finibus accumsan elit vel pellentesque. Nunc nec nisi nec massa feugiat fermentum sed ac erat. Nullam interdum metus nec orci tincidunt accumsan. Maecenas purus tortor, tincidunt eget venenatis ut, euismod eu ligula. Praesent venenatis erat eu mauris consectetur elementum. Pellentesque ut ipsum lectus.</p>\r\n\r\n<p>Quisque faucibus diam neque, euismod mattis neque dictum eu. Integer dolor erat, rhoncus ac diam sed, sodales posuere tellus. Nulla eu sodales diam. Integer nunc nibh, venenatis et finibus vitae, viverra sed dui. Ut ut convallis metus, nec posuere libero. Curabitur at felis ac sapien vestibulum auctor consequat in mi. Vivamus vehicula auctor magna eget condimentum. Pellentesque feugiat nisi quis lorem pretium pretium. Fusce eget ornare ligula. Nunc tristique lacus lorem, eu pretium ante placerat a. Quisque bibendum ex ac pellentesque venenatis. Proin auctor, risus vel dictum venenatis, lorem purus imperdiet nisl, et interdum turpis magna et magna. Pellentesque accumsan leo magna, a molestie turpis posuere id. Maecenas elementum, eros ac semper gravida, massa eros finibus velit, vel suscipit justo libero eget enim. Morbi eu tincidunt massa, placerat porta mi. Nunc orci nisl, ultricies non diam accumsan, cursus tincidunt diam.</p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras venenatis tristique enim non posuere. In vitae pulvinar dui, a consectetur neque. Sed imperdiet turpis et quam hendrerit interdum. Proin porta tellus nec tellus condimentum, at volutpat ligula varius. Aliquam pretium mauris vel tortor interdum, in porttitor mi interdum. Duis consequat sed purus nec egestas.</p>\r\n\r\n<p>Nunc vel vehicula ipsum, vel elementum neque. Donec efficitur tempus augue ac scelerisque. Aenean elementum non neque non congue. Duis mollis commodo mauris, eu rutrum lacus ullamcorper a. Proin vestibulum, sem et tincidunt imperdiet, justo augue consequat eros, facilisis cursus ipsum tellus id nisl. Pellentesque blandit neque nec nisi tincidunt finibus. Nullam vitae tellus egestas, ultrices ligula vel, auctor dui. Praesent rhoncus imperdiet tristique.</p>\r\n', '2022-07-03', '62c1826b54bb1.jpg'),
(7, 5, 1, 3, 'Kamu', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2022-07-04', '62c24bba39501.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL,
  `id_jenistulisan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tulisan` text NOT NULL,
  `link_yt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id_konten`, `id_jenistulisan`, `judul`, `tulisan`, `link_yt`) VALUES
(1, 1, 'Apa itu cerpen?', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at vestibulum mauris. Nunc quis libero nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum augue ipsum, lacinia rhoncus egestas aliquet, posuere sit amet quam. Sed feugiat fermentum dapibus. Nullam diam nisl, blandit nec felis non, convallis fringilla magna. Cras nec ligula ac massa bibendum luctus.</p>\r\n\r\n<p>Nam tincidunt commodo orci, ut iaculis sem iaculis vel. Nulla facilisi. Sed id condimentum nulla, et interdum arcu. Aliquam erat volutpat. Curabitur dapibus ut diam id venenatis. Fusce suscipit eget magna sit amet commodo. Sed imperdiet euismod sapien sit amet accumsan. Praesent sed feugiat metus. Aliquam vel felis feugiat, scelerisque leo sed, tempus nisl.</p>\r\n\r\n<p>Fusce lobortis urna et rhoncus hendrerit. Duis ullamcorper lacus eu ex sagittis semper. Quisque sit amet cursus quam, a posuere turpis. Morbi blandit odio dui, nec porttitor mi ultrices at. Maecenas a aliquam tellus. Aliquam erat volutpat. Proin placerat justo sit amet ante pellentesque, at fringilla libero tempor. Aliquam efficitur nisl id auctor auctor. Donec sagittis sem id dictum viverra. Aenean quis diam cursus, fermentum diam eget, condimentum orci. Phasellus eget massa varius, pulvinar purus maximus, pulvinar lectus. Nunc at massa a neque ultrices sagittis id id ligula. In hac habitasse platea dictumst. Maecenas facilisis pellentesque ipsum, et dapibus lorem.</p>\r\n\r\n<p>Curabitur felis sapien, venenatis a efficitur vitae, placerat nec mi. Cras pulvinar, tellus vitae aliquam vestibulum, neque purus tempus dolor, eget feugiat dolor lectus non tortor. Proin a convallis orci. Morbi molestie lacus nisl, sed sodales neque pretium eget. Morbi placerat elementum eros ac egestas. Maecenas nibh tellus, lacinia vitae commodo eget, ultrices at sem. Donec vel vehicula mi. Nullam nisl lorem, condimentum sit amet purus eget, aliquam efficitur enim. Curabitur vel leo at massa viverra mollis. Nunc vel magna enim. Mauris tempor, lorem vel pulvinar vulputate, orci metus vehicula nisl, et sollicitudin lorem est eu tortor. Praesent vitae sapien sapien. Nam vitae erat orci. Vestibulum quis justo at justo facilisis vehicula.</p>\r\n\r\n<p>Integer fermentum risus sit amet congue dapibus. Nunc vehicula sed enim eget tristique. Sed ut vestibulum leo, sed dignissim velit. Fusce eu faucibus ante. Mauris leo mauris, rhoncus at dictum et, iaculis et ex. Vestibulum condimentum id tortor et congue. Donec interdum ut orci a porta. Cras gravida est vel mollis lobortis. In et tristique velit. Sed sagittis tortor quis sodales semper. Aliquam faucibus porttitor elit, vitae faucibus quam venenatis eget. Donec eu blandit massa. Proin quis velit nec tortor maximus congue. Nunc tristique ac turpis ac placerat. Donec eu sem felis.</p>\r\n', 'DwuRvg83Z58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_karya`
--

CREATE TABLE `permintaan_karya` (
  `id_permintaan` int(11) NOT NULL,
  `id_peminta` int(11) NOT NULL,
  `id_jenistulisan` int(11) NOT NULL,
  `id_jeniskarya` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tgl_batasupload` date NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permintaan_karya`
--

INSERT INTO `permintaan_karya` (`id_permintaan`, `id_peminta`, `id_jenistulisan`, `id_jeniskarya`, `status`, `tgl_batasupload`, `keterangan`, `file`) VALUES
(2, 3, 3, 3, 'Diajukan', '2022-07-13', '<p>csagrtagte</p>\r\n', ''),
(3, 3, 3, 3, 'Diajukan', '2022-07-13', '<p>csagrtagte</p>\r\n', ''),
(4, 3, 3, 3, 'Diajukan', '2022-07-13', '<p>csagrtagte</p>\r\n', ''),
(5, 3, 3, 3, 'Diajukan', '2022-07-13', '<p>csagrtagte</p>\r\n', ''),
(6, 3, 3, 3, 'Diajukan', '2022-07-08', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', ''),
(7, 1, 1, 3, 'Selesai', '2022-07-07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '62c25e0c5cbf3.pdf'),
(8, 4, 2, 3, '0', '2022-07-07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', ''),
(9, 4, 3, 3, 'Diajukan', '2022-07-07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `harga_penulisan` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `level`, `email`, `password`, `harga_penulisan`, `foto`) VALUES
(1, 'person', '', 'person@gmail.com', '', 100000, 'person-icon.png'),
(3, 'billgates', 'anggota', 'bill@gmail.com', '$2y$10$14I4LI0ZvZpgMT3Ra.Jp2erPO6XIoeigSQY2zHfi61rUWJZW31xzy', 120000, '62c15139444d2.jpg'),
(4, 'admin', 'admin', 'admin@gmail.com', '$2y$10$S4ppl9EhHHAotF.YVLbAJuYzOGqxcaR1yGS/MArWnJtHDdWzvZHJm', 400000, 'person-icon.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  ADD PRIMARY KEY (`id_permintaan`,`id_penulis`),
  ADD KEY `fkmintapenulis` (`id_penulis`);

--
-- Indeks untuk tabel `feedback_karya`
--
ALTER TABLE `feedback_karya`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `fkkarya` (`id_karya`);

--
-- Indeks untuk tabel `jenis_karya`
--
ALTER TABLE `jenis_karya`
  ADD PRIMARY KEY (`id_jeniskarya`);

--
-- Indeks untuk tabel `jenis_tulisan`
--
ALTER TABLE `jenis_tulisan`
  ADD PRIMARY KEY (`id_jenistulisan`);

--
-- Indeks untuk tabel `karya`
--
ALTER TABLE `karya`
  ADD PRIMARY KEY (`id_karya`),
  ADD KEY `fkjnskarya` (`id_jeniskarya`),
  ADD KEY `fkjnstulisan` (`id_jenistulisan`),
  ADD KEY `fkpenulis` (`id_penulis`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`),
  ADD KEY `fkjenistulisann` (`id_jenistulisan`);

--
-- Indeks untuk tabel `permintaan_karya`
--
ALTER TABLE `permintaan_karya`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `fkpeminta` (`id_peminta`),
  ADD KEY `fkmintajenistulisan` (`id_jenistulisan`),
  ADD KEY `fkmintajeniskarya` (`id_jeniskarya`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `feedback_karya`
--
ALTER TABLE `feedback_karya`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_karya`
--
ALTER TABLE `jenis_karya`
  MODIFY `id_jeniskarya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_tulisan`
--
ALTER TABLE `jenis_tulisan`
  MODIFY `id_jenistulisan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `karya`
--
ALTER TABLE `karya`
  MODIFY `id_karya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permintaan_karya`
--
ALTER TABLE `permintaan_karya`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  ADD CONSTRAINT `fkmintapenulis` FOREIGN KEY (`id_penulis`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkpermintaan` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan_karya` (`id_permintaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `feedback_karya`
--
ALTER TABLE `feedback_karya`
  ADD CONSTRAINT `fkkarya` FOREIGN KEY (`id_karya`) REFERENCES `karya` (`id_karya`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `karya`
--
ALTER TABLE `karya`
  ADD CONSTRAINT `fkjnskarya` FOREIGN KEY (`id_jeniskarya`) REFERENCES `jenis_karya` (`id_jeniskarya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkjnstulisan` FOREIGN KEY (`id_jenistulisan`) REFERENCES `jenis_tulisan` (`id_jenistulisan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkpenulis` FOREIGN KEY (`id_penulis`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `fkjenistulisann` FOREIGN KEY (`id_jenistulisan`) REFERENCES `jenis_tulisan` (`id_jenistulisan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permintaan_karya`
--
ALTER TABLE `permintaan_karya`
  ADD CONSTRAINT `fkmintajeniskarya` FOREIGN KEY (`id_jeniskarya`) REFERENCES `jenis_karya` (`id_jeniskarya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmintajenistulisan` FOREIGN KEY (`id_jenistulisan`) REFERENCES `jenis_tulisan` (`id_jenistulisan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkpeminta` FOREIGN KEY (`id_peminta`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
