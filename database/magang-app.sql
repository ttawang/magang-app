/*
 Navicat Premium Data Transfer

 Source Server         : local-mysql
 Source Server Type    : MySQL
 Source Server Version : 100416
 Source Host           : localhost:3306
 Source Schema         : magang-app

 Target Server Type    : MySQL
 Target Server Version : 100416
 File Encoding         : 65001

 Date: 10/06/2022 19:12:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_walikelas` int NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES (1, 'Teknik Gambar Bangunan', 28, '2022-05-09 04:55:53', '2022-05-09 07:10:30');
INSERT INTO `kelas` VALUES (2, 'Teknik Instalasi Listrik', 29, '2022-05-09 04:56:41', '2022-05-09 07:10:21');
INSERT INTO `kelas` VALUES (3, 'Teknik Permesinan', 30, '2022-05-09 04:57:14', '2022-05-09 07:10:09');
INSERT INTO `kelas` VALUES (4, 'Teknik Kendaraan Ringan', 31, '2022-05-09 04:57:27', '2022-05-09 07:09:59');
INSERT INTO `kelas` VALUES (5, 'Teknik Audio Vidio', 32, '2022-05-09 04:57:46', '2022-05-09 07:09:47');
INSERT INTO `kelas` VALUES (6, 'Teknik Komputer Jaringan', 27, '2022-05-09 04:58:01', '2022-05-09 07:09:31');
INSERT INTO `kelas` VALUES (7, 'Multimedia', 34, '2022-05-09 04:58:11', '2022-05-09 07:09:19');
INSERT INTO `kelas` VALUES (8, 'Rekayasa Perangkat Lunak', 33, '2022-05-09 05:06:12', '2022-05-09 07:09:08');

-- ----------------------------
-- Table structure for kelompok
-- ----------------------------
DROP TABLE IF EXISTS `kelompok`;
CREATE TABLE `kelompok`  (
  `id_kelompok` int NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_periode` int NULL DEFAULT NULL,
  `konfirmasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'no',
  `nilai` enum('A','B','C','D','E') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelompok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelompok
-- ----------------------------
INSERT INTO `kelompok` VALUES (2, 20, 3, '2022-05-19 04:28:21', '2022-05-19 04:28:21', 1, 'no', NULL);
INSERT INTO `kelompok` VALUES (3, 17, 4, '2022-05-19 04:28:59', '2022-05-19 04:28:59', 1, 'yes', 'A');
INSERT INTO `kelompok` VALUES (4, 24, 2, '2022-05-19 08:18:31', '2022-05-19 08:18:31', 1, 'no', NULL);
INSERT INTO `kelompok` VALUES (5, 17, 5, '2022-05-20 02:35:53', '2022-05-20 02:35:53', 1, 'yes', 'A');

-- ----------------------------
-- Table structure for laporan_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `laporan_kegiatan`;
CREATE TABLE `laporan_kegiatan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kelompok` int NOT NULL,
  `anggota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail_kegiatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laporan_kegiatan
-- ----------------------------
INSERT INTO `laporan_kegiatan` VALUES (1, 5, 'semua', '2022-05-20', 'Kegiatan 1', 'Mempelajari Framework Laravel', '2022-05-20 07:43:29', '2022-05-20 07:43:29');
INSERT INTO `laporan_kegiatan` VALUES (2, 5, 'semua', '2022-05-20', 'Laravel', 'Membuat login dengan laravel', '2022-05-20 07:43:49', '2022-05-20 07:43:49');
INSERT INTO `laporan_kegiatan` VALUES (3, 5, 'semua', '2022-05-20', 'Laravel', 'Membuat CRUD laravel', '2022-05-20 07:44:03', '2022-05-20 07:44:03');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_09_21_173337_create_tests_table', 2);
INSERT INTO `migrations` VALUES (16, '2021_09_23_024119_create_students_table', 3);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `po_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `status` enum('AWAL PESAN','BELUM DISETUJUI','DISETUJUI SEBAGIAN','DISETUJUI SEMUA','PENDING','SENT','RETURN') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AWAL PESAN',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tagihan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `harga_order` bigint NULL DEFAULT NULL,
  `nama_barang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `potongan_order_rp` int NULL DEFAULT 0,
  `potongan_order_persen` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `orders_po_id_foreign`(`po_id`) USING BTREE,
  INDEX `orders_product_id_foreign`(`product_id`) USING BTREE,
  INDEX `tagihan_id`(`tagihan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 1, 6, 2, 'AWAL PESAN', '2022-03-31 03:33:02', '2022-03-31 03:33:02', NULL, 43690, 'Rel U Alumunium 23,5 10 std  6  CA', 0, 0);
INSERT INTO `orders` VALUES (2, 1, 6, 2, 'DISETUJUI SEMUA', '2022-03-31 03:33:02', '2022-03-31 03:33:37', 1, 43690, 'Rel U Alumunium 23,5 10 std  6  CA', 0, 0);
INSERT INTO `orders` VALUES (3, 1, 279, 3, 'AWAL PESAN', '2022-03-31 03:33:02', '2022-03-31 03:33:02', NULL, 51655, 'Slad Full Alumunium 5cmx5.5mx0,7', 0, 0);
INSERT INTO `orders` VALUES (4, 1, 279, 3, 'DISETUJUI SEMUA', '2022-03-31 03:33:02', '2022-03-31 03:33:37', 1, 51655, 'Slad Full Alumunium 5cmx5.5mx0,7', 0, 0);
INSERT INTO `orders` VALUES (5, 2, 6, 6, 'AWAL PESAN', '2022-04-13 02:23:20', '2022-04-13 02:23:20', NULL, 43690, 'Rel U Alumunium 23,5 10 std  6  CA', 0, 0);
INSERT INTO `orders` VALUES (6, 2, 6, 6, 'DISETUJUI SEMUA', '2022-04-13 02:23:20', '2022-04-13 02:24:26', 2, 43690, 'Rel U Alumunium 23,5 10 std  6  CA', 0, 0);
INSERT INTO `orders` VALUES (7, 2, 279, 2, 'AWAL PESAN', '2022-04-13 02:23:21', '2022-04-13 02:23:21', NULL, 51655, 'Slad Full Alumunium 5cmx5.5mx0,7', 0, 0);
INSERT INTO `orders` VALUES (8, 2, 279, 2, 'DISETUJUI SEMUA', '2022-04-13 02:23:21', '2022-04-13 02:24:26', 2, 51655, 'Slad Full Alumunium 5cmx5.5mx0,7', 0, 0);
INSERT INTO `orders` VALUES (9, 3, 105, 5, 'AWAL PESAN', '2022-04-14 02:45:33', '2022-04-14 02:45:33', NULL, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (10, 3, 105, 5, 'DISETUJUI SEMUA', '2022-04-14 02:45:33', '2022-04-14 02:46:21', 3, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (11, 3, 224, 5, 'AWAL PESAN', '2022-04-14 02:45:33', '2022-04-14 02:45:33', NULL, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (12, 3, 224, 5, 'DISETUJUI SEMUA', '2022-04-14 02:45:33', '2022-04-14 02:46:21', 3, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (13, 4, 224, 10, 'AWAL PESAN', '2022-04-14 03:06:18', '2022-04-14 03:06:18', NULL, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (14, 4, 224, 10, 'DISETUJUI SEMUA', '2022-04-14 03:06:18', '2022-04-14 03:07:10', 4, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (15, 4, 105, 10, 'AWAL PESAN', '2022-04-14 03:06:18', '2022-04-14 03:06:18', NULL, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (16, 4, 105, 10, 'DISETUJUI SEMUA', '2022-04-14 03:06:18', '2022-04-14 03:07:10', 4, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (17, 5, 105, 3, 'AWAL PESAN', '2022-04-14 03:46:46', '2022-04-14 03:46:46', NULL, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (18, 5, 105, 3, 'DISETUJUI SEMUA', '2022-04-14 03:46:46', '2022-04-14 04:18:21', 5, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (19, 5, 1, 4, 'AWAL PESAN', '2022-04-14 03:46:46', '2022-04-14 03:46:46', NULL, 57817, 'List H kecil Alumunium 22 9,1 0,9 6  CA', 0, 0);
INSERT INTO `orders` VALUES (20, 5, 1, 4, 'DISETUJUI SEMUA', '2022-04-14 03:46:46', '2022-04-14 04:18:21', 5, 57817, 'List H kecil Alumunium 22 9,1 0,9 6  CA', 0, 0);
INSERT INTO `orders` VALUES (21, 6, 224, 10, 'AWAL PESAN', '2022-04-14 04:36:34', '2022-04-14 04:36:34', NULL, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (22, 6, 224, 10, 'DISETUJUI SEMUA', '2022-04-14 04:36:34', '2022-04-14 04:37:40', 6, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (23, 7, 224, 10, 'AWAL PESAN', '2022-04-14 04:41:12', '2022-04-14 04:41:12', NULL, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (24, 7, 224, 10, 'DISETUJUI SEMUA', '2022-04-14 04:41:13', '2022-04-14 04:41:48', 7, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (25, 8, 224, 5, 'AWAL PESAN', '2022-04-14 07:37:03', '2022-04-14 07:37:03', NULL, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (26, 8, 224, 5, 'DISETUJUI SEMUA', '2022-04-14 07:37:03', '2022-05-11 05:06:43', 11, 561263, 'Plat Alumunium (1100) 120x240x1.3', 1000, 0);
INSERT INTO `orders` VALUES (27, 9, 224, 5, 'AWAL PESAN', '2022-04-18 02:18:03', '2022-04-18 02:18:03', NULL, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (28, 9, 224, 5, 'DISETUJUI SEMUA', '2022-04-18 02:18:03', '2022-04-18 02:23:47', 8, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (29, 9, 105, 5, 'AWAL PESAN', '2022-04-18 02:18:03', '2022-04-18 02:18:03', NULL, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (30, 9, 105, 5, 'DISETUJUI SEMUA', '2022-04-18 02:18:03', '2022-04-18 02:23:47', 8, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (31, 10, 224, 5, 'AWAL PESAN', '2022-04-18 07:18:32', '2022-04-18 07:18:32', NULL, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (32, 10, 224, 5, 'DISETUJUI SEMUA', '2022-04-18 07:18:32', '2022-04-18 07:19:03', 9, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (33, 10, 105, 4, 'AWAL PESAN', '2022-04-18 07:18:32', '2022-04-18 07:18:32', NULL, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (34, 10, 105, 4, 'DISETUJUI SEMUA', '2022-04-18 07:18:32', '2022-04-18 07:19:03', 9, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (35, 11, 224, 18, 'AWAL PESAN', '2022-04-20 04:27:44', '2022-04-20 04:27:44', NULL, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (36, 11, 224, 18, 'DISETUJUI SEMUA', '2022-04-20 04:27:44', '2022-04-20 04:28:35', 10, 561263, 'Plat Alumunium (1100) 120x240x1.3', 0, 0);
INSERT INTO `orders` VALUES (37, 11, 105, 20, 'AWAL PESAN', '2022-04-20 04:27:44', '2022-04-20 04:27:44', NULL, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (38, 11, 105, 20, 'DISETUJUI SEMUA', '2022-04-20 04:27:44', '2022-04-20 04:28:35', 10, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (39, 12, 105, 4, 'AWAL PESAN', '2022-05-10 07:26:17', '2022-05-10 07:26:17', NULL, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (40, 12, 105, 4, 'BELUM DISETUJUI', '2022-05-10 07:26:17', '2022-05-10 07:26:17', NULL, 53994, 'Hollow Alumunium 16x16x0.9', 0, 0);
INSERT INTO `orders` VALUES (41, 12, 1, 6, 'AWAL PESAN', '2022-05-10 07:26:17', '2022-05-10 07:26:17', NULL, 57817, 'List H kecil Alumunium 22 9,1 0,9 6  CA', 0, 0);
INSERT INTO `orders` VALUES (42, 12, 1, 6, 'BELUM DISETUJUI', '2022-05-10 07:26:17', '2022-05-10 07:26:17', NULL, 57817, 'List H kecil Alumunium 22 9,1 0,9 6  CA', 0, 0);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for periode
-- ----------------------------
DROP TABLE IF EXISTS `periode`;
CREATE TABLE `periode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_periode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tglmulai` date NULL DEFAULT NULL,
  `tglselesai` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('off','on') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'on',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of periode
-- ----------------------------
INSERT INTO `periode` VALUES (1, 'Periode 1', '2022-05-01', '2022-05-19', '2022-05-11 02:35:24', '2022-05-20 08:18:40', 'on');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `recommended` int NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kuota` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------
INSERT INTO `perusahaan` VALUES (1, 'PT. Anugrah Kontraktor', 'anugrahkontaktor_malang@gmail.com', NULL, 'Jl. Simbar Menjangan Kav2/23B', 1, '2022-05-09 05:14:00', '2022-05-09 07:13:13', 4);
INSERT INTO `perusahaan` VALUES (2, 'PT. Maestro', 'maestromalang@gmail.com', NULL, 'Jl. Sumbersari Dalam 23A', 1, '2022-05-09 05:17:05', '2022-05-09 07:13:35', 2);
INSERT INTO `perusahaan` VALUES (3, 'PMII Sejahtera', 'pmiisejahtera@gamil.com', NULL, 'Jl. Guntur No.15', 1, '2022-05-09 05:17:42', '2022-05-09 07:13:28', 4);
INSERT INTO `perusahaan` VALUES (4, 'PT. PLN Malang', 'plnmalangraya@gmail.com', NULL, 'Jl. Mt. Hariyono No.102B Malang', 1, '2022-05-09 05:18:28', '2022-05-09 07:13:21', 3);
INSERT INTO `perusahaan` VALUES (5, 'BPS Kota Malang', 'bpsmalang@gmail.com', NULL, 'Jl. LA Adisucipto Kav87', 0, '2022-05-09 05:19:19', '2022-05-09 05:19:19', 2);
INSERT INTO `perusahaan` VALUES (6, 'PT. Mulia Mekanikal Elektrikal', 'muliamekanikal@gmail.com', NULL, 'Jl. Galunggung 64A', 1, '2022-05-09 05:19:59', '2022-05-09 07:12:41', 2);
INSERT INTO `perusahaan` VALUES (7, 'PT. Smoore Technology', 'smoore_technology@gmail.com', NULL, 'Jl. Veteran Barat No. 2B', 1, '2022-05-09 05:20:51', '2022-05-09 07:12:49', 4);
INSERT INTO `perusahaan` VALUES (8, 'PT. Alfan Mechatrinic', 'alfanmechatirnic@gmail.com', NULL, 'Jl. Bendungan Sutami Kav2/No. 21A', 0, '2022-05-09 05:21:41', '2022-05-09 05:21:41', 4);
INSERT INTO `perusahaan` VALUES (9, 'Graha Mesin Globalindo', 'grahaglobalindo@gmail.com', NULL, 'Jl .Laksamada Adisucipto No.66BE', 1, '2022-05-09 06:44:26', '2022-05-09 07:13:00', 2);
INSERT INTO `perusahaan` VALUES (10, 'PT. Victory', 'victory.malang@gmail.com', NULL, 'Jl. Soekarno Hatta No.121 Kav.47', 0, '2022-05-09 06:46:00', '2022-05-09 06:46:00', 4);
INSERT INTO `perusahaan` VALUES (11, 'PT. Cipta Mitra Kualitama', 'ciptamitrakualitama@gmail.com', NULL, 'Jl. Griya Shanta No.67 Blok E', 1, '2022-05-09 06:46:50', '2022-05-09 07:12:31', 6);
INSERT INTO `perusahaan` VALUES (12, 'Ahass Honda', 'ahashonda.malang@gmail.com', NULL, 'Jl. Raya Tlogomas No.143B', 0, '2022-05-09 06:48:43', '2022-05-09 06:48:43', 2);
INSERT INTO `perusahaan` VALUES (13, 'Yamaha Dealer', 'yamahamalang@gmail.com', NULL, 'Jl. MT Haryono No150', 1, '2022-05-09 06:49:37', '2022-05-09 07:12:18', 2);
INSERT INTO `perusahaan` VALUES (14, 'Kartika Sari', 'kartikasari@gmail.com', NULL, 'Jl. Soekarno Hatta Kav.25 No.2', 0, '2022-05-09 06:50:29', '2022-05-09 06:50:29', 3);
INSERT INTO `perusahaan` VALUES (15, 'Bengkel Suzuki', 'suzukimalang@gmail.com', NULL, 'Jl. Janti Barat No.67', 0, '2022-05-09 06:51:18', '2022-05-09 06:51:18', 2);
INSERT INTO `perusahaan` VALUES (16, 'Radio Elfara', 'radioelfara@gmail.com', NULL, 'Jl. Raya Tidar No.54 Blok H', 0, '2022-05-09 06:52:01', '2022-05-09 06:52:01', 4);
INSERT INTO `perusahaan` VALUES (17, 'Dhama TV Malang', 'dhamatv_malang@gmail.com', NULL, 'Jl. Kalpataru No. 98 AB', 1, '2022-05-09 06:52:42', '2022-05-09 07:12:04', 6);
INSERT INTO `perusahaan` VALUES (18, 'Rang Laptop', 'rang202@gmail.com', NULL, 'Jl. Terusan Surabaya No. 65', 0, '2022-05-09 06:54:27', '2022-05-09 06:54:27', 3);
INSERT INTO `perusahaan` VALUES (19, 'My Republic Malang', 'myrepublic.malang@gmail.com', NULL, 'Jl. Bogor No. 72 A', 1, '2022-05-09 06:55:36', '2022-05-09 07:13:45', 4);
INSERT INTO `perusahaan` VALUES (20, 'Kapten Naratel', 'kapten.naratel@gmail.com', NULL, 'Jl. Borobudur Timur Blok C No.32', 1, '2022-05-09 06:56:13', '2022-05-09 07:11:58', 4);
INSERT INTO `perusahaan` VALUES (21, 'RTV Malang', 'rtv_malang@gmail.com', NULL, 'Jl. Bumiaju No. 98 Batu', 0, '2022-05-09 06:57:07', '2022-05-09 06:57:07', 6);
INSERT INTO `perusahaan` VALUES (22, 'Batu TV Malang', 'batutv.malangraya@gmail.com', NULL, 'Jl. Pekopek Bumiaji No. 203/Kav2 Batu', 1, '2022-05-09 06:58:14', '2022-05-09 07:11:46', 4);
INSERT INTO `perusahaan` VALUES (23, 'PT. Arion Indonesia', 'arionindonesia@gmail.com', NULL, 'Jl. Tenaga Barat No. 43', 1, '2022-05-09 06:58:52', '2022-05-09 07:11:22', 3);
INSERT INTO `perusahaan` VALUES (24, 'PT. Malang Multimedia Mandiri', 'multimedia_mandiri@gmail.com', NULL, 'Jl. Kauman No. 27/02 AB', 1, '2022-05-09 06:59:34', '2022-05-09 07:11:08', 2);

-- ----------------------------
-- Table structure for purchase_orders
-- ----------------------------
DROP TABLE IF EXISTS `purchase_orders`;
CREATE TABLE `purchase_orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_nota` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` bigint UNSIGNED NULL DEFAULT NULL COMMENT 'pengirim (gudang)',
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'pembeli',
  `jatuh_tempo` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `potongan_po_rp` int NULL DEFAULT 0,
  `potongan_po_persen` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `purchase_orders_user_id_foreign`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of purchase_orders
-- ----------------------------
INSERT INTO `purchase_orders` VALUES (1, 'ORD-VFZSQmQwNUJQVDA920220331033302', NULL, 1004, '2022-03-31 03:51:18', '2022-03-31 03:33:02', '2022-03-31 03:51:34', 0, 0);
INSERT INTO `purchase_orders` VALUES (2, 'COD-ORD-VFZSQmVBPT0=20220413022320', NULL, 101, '2022-04-13 02:24:30', '2022-04-13 02:23:20', '2022-04-13 02:29:08', 0, 0);
INSERT INTO `purchase_orders` VALUES (3, 'ORD-VFZSQmVBPT0=20220414024533', NULL, 101, '2022-04-14 04:10:18', '2022-04-14 02:45:33', '2022-04-14 04:11:52', 0, 0);
INSERT INTO `purchase_orders` VALUES (4, 'ORD-VFZSQmVBPT0=20220414030618', NULL, 101, '2022-04-14 03:26:49', '2022-04-14 03:06:18', '2022-04-14 03:27:08', 0, 0);
INSERT INTO `purchase_orders` VALUES (5, 'COD-ORD-VFZSQmVBPT0=20220414034645', NULL, 101, '2022-04-27 02:38:40', '2022-04-14 03:46:45', '2022-04-27 02:39:00', 0, 0);
INSERT INTO `purchase_orders` VALUES (6, 'COD-ORD-VFZSQmVBPT0=20220414043633', NULL, 101, '2022-04-27 02:38:40', '2022-04-14 04:36:33', '2022-04-27 02:39:51', 0, 0);
INSERT INTO `purchase_orders` VALUES (7, 'COD-ORD-VFZSQmVBPT0=20220414044112', NULL, 101, '2022-04-27 02:49:22', '2022-04-14 04:41:12', '2022-04-27 02:50:05', 0, 0);
INSERT INTO `purchase_orders` VALUES (8, 'COD-ORD-VFZSQmVBPT0=20220414073703', NULL, 101, '2022-05-11 05:14:39', '2022-04-14 07:37:03', '2022-05-11 05:15:44', 0, 0);
INSERT INTO `purchase_orders` VALUES (9, 'COD-ORD-VFZSQmVBPT0=20220418021803', NULL, 101, NULL, '2022-04-18 02:18:03', '2022-04-18 02:18:03', 0, 0);
INSERT INTO `purchase_orders` VALUES (10, 'COD-ORD-VFZSQmVBPT0=20220418071832', NULL, 101, NULL, '2022-04-18 07:18:32', '2022-04-18 07:18:32', 0, 0);
INSERT INTO `purchase_orders` VALUES (11, 'COD-ORD-VFZSQmVBPT0=20220420042743', NULL, 101, NULL, '2022-04-20 04:27:43', '2022-04-20 04:27:43', 0, 0);
INSERT INTO `purchase_orders` VALUES (12, 'COD-ORD-VFZSQmVBPT0=20220510072615', NULL, 101, NULL, '2022-05-10 07:26:15', '2022-05-10 07:26:15', 0, 0);

-- ----------------------------
-- Table structure for ref_gudang
-- ----------------------------
DROP TABLE IF EXISTS `ref_gudang`;
CREATE TABLE `ref_gudang`  (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `id_profil` int NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint NULL DEFAULT NULL COMMENT '1=aktif,2=tidak aktif',
  `kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ref_gudang
-- ----------------------------
INSERT INTO `ref_gudang` VALUES (8, 1, 'Gudang SINARBAJA', 'KEDIRI', 1, 'SB', '2019-10-10 23:22:21', '2022-01-19 14:39:16');
INSERT INTO `ref_gudang` VALUES (17, 1, 'Gudang Sinar Besi', 'KEDIRI', 1, 'SBS', '2022-01-26 14:35:46', '2022-01-26 14:36:14');

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `id_kelas` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES (1, 2, 1, '2022-05-09 04:59:13', '2022-05-09 04:59:13');
INSERT INTO `siswa` VALUES (2, 3, 1, '2022-05-09 05:00:07', '2022-05-09 05:00:07');
INSERT INTO `siswa` VALUES (3, 4, 2, '2022-05-09 05:00:35', '2022-05-09 05:00:35');
INSERT INTO `siswa` VALUES (4, 5, 2, '2022-05-09 05:01:03', '2022-05-09 05:01:03');
INSERT INTO `siswa` VALUES (5, 6, 3, '2022-05-09 05:01:29', '2022-05-09 05:01:29');
INSERT INTO `siswa` VALUES (6, 7, 3, '2022-05-09 05:01:56', '2022-05-09 05:01:56');
INSERT INTO `siswa` VALUES (7, 8, 4, '2022-05-09 05:02:20', '2022-05-09 05:02:20');
INSERT INTO `siswa` VALUES (8, 9, 6, '2022-05-09 05:03:07', '2022-05-09 05:03:07');
INSERT INTO `siswa` VALUES (9, 10, 6, '2022-05-09 05:03:43', '2022-05-09 05:03:43');
INSERT INTO `siswa` VALUES (10, 11, 4, '2022-05-09 05:04:13', '2022-05-09 05:04:13');
INSERT INTO `siswa` VALUES (11, 12, 5, '2022-05-09 05:05:08', '2022-05-09 05:05:08');
INSERT INTO `siswa` VALUES (12, 13, 5, '2022-05-09 05:05:29', '2022-05-09 05:05:29');
INSERT INTO `siswa` VALUES (13, 14, 8, '2022-05-09 05:06:38', '2022-05-09 05:06:38');
INSERT INTO `siswa` VALUES (14, 15, 8, '2022-05-09 05:07:08', '2022-05-09 05:07:08');
INSERT INTO `siswa` VALUES (15, 16, 8, '2022-05-09 05:07:31', '2022-05-09 05:07:31');
INSERT INTO `siswa` VALUES (16, 17, 7, '2022-05-09 05:08:12', '2022-05-09 05:08:12');
INSERT INTO `siswa` VALUES (17, 18, 7, '2022-05-09 05:08:38', '2022-05-09 05:08:38');
INSERT INTO `siswa` VALUES (18, 19, 7, '2022-05-09 05:09:00', '2022-05-09 05:09:00');
INSERT INTO `siswa` VALUES (19, 20, 3, '2022-05-09 05:09:30', '2022-05-09 05:09:30');
INSERT INTO `siswa` VALUES (20, 21, 6, '2022-05-09 05:09:54', '2022-05-09 05:09:54');
INSERT INTO `siswa` VALUES (21, 22, 6, '2022-05-09 05:10:20', '2022-05-09 05:10:20');
INSERT INTO `siswa` VALUES (22, 23, 2, '2022-05-09 05:10:44', '2022-05-09 05:10:44');
INSERT INTO `siswa` VALUES (23, 24, 7, '2022-05-09 05:11:19', '2022-05-09 05:11:19');
INSERT INTO `siswa` VALUES (24, 25, 7, '2022-05-09 05:11:43', '2022-05-09 05:11:43');
INSERT INTO `siswa` VALUES (25, 26, 4, '2022-05-09 05:12:07', '2022-05-09 05:12:07');

-- ----------------------------
-- Table structure for tagihans
-- ----------------------------
DROP TABLE IF EXISTS `tagihans`;
CREATE TABLE `tagihans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `po_id` bigint UNSIGNED NOT NULL,
  `driver_id` bigint UNSIGNED NULL DEFAULT NULL,
  `nominal_total` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('BELUM DIBAYAR','DIBAYAR SEBAGIAN','LUNAS') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_tagihan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_gudang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `memo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan_gudang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `potongan_po_rp` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tagihans_po_id_foreign`(`po_id`) USING BTREE,
  INDEX `tagihans_driver_id_foreign`(`driver_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tagihans
-- ----------------------------
INSERT INTO `tagihans` VALUES (1, 1, 1003, '242345', 'LUNAS', 'Transfer', '2022-03-31 03:33:37', '2022-03-31 03:51:34', 'TAG-VFZFOVBRPT0=20220331033337', '[[2,\"Gudang SINARBAJA\",\"2\",8],[4,\"Gudang SINARBAJA\",\"3\",8]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (2, 2, 5, '365450', 'LUNAS', 'COD', '2022-04-13 02:24:25', '2022-04-13 02:46:24', 'TAG-VFZFOVBRPT0=20220413022425', '[[6,\"Gudang SINARBAJA\",\"6\",8],[8,\"Gudang SINARBAJA\",\"2\",8]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (3, 3, 1003, '3076285', 'LUNAS', 'Transfer', '2022-04-14 02:46:21', '2022-04-14 04:11:52', 'TAG-VFZFOVBRPT0=20220414024621', '[[10,\"Gudang Sinar Besi\",\"4\",17],[12,\"Gudang SINARBAJA\",\"3\",8]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (4, 4, 5, '6152570', 'LUNAS', 'Transfer', '2022-04-14 03:07:09', '2022-04-14 03:27:08', 'TAG-VFZFOVBRPT0=20220414030709', '[[14,\"Gudang SINARBAJA\",\"10\",8],[16,\"Gudang Sinar Besi\",\"10\",17]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (5, 5, 6, '393250', 'BELUM DIBAYAR', 'COD', '2022-04-14 04:18:20', '2022-04-27 02:39:50', 'TAG-VFZFOVBRPT0=20220414041820', '[[\"18\",\"Gudang Sinar Besi\",\"181\"],[\"20\",\"Gudang SINARBAJA\",\"70\"]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (6, 6, 6, '5612630', 'BELUM DIBAYAR', 'COD', '2022-04-14 04:37:40', '2022-04-27 02:39:50', 'TAG-VFZFOVBRPT0=20220414043740', '[[\"22\",\"Gudang SINARBAJA\",\"127\"],[\"22\",\"Gudang Sinar Besi\",\" -5\"]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (7, 7, 4, '5612630', 'BELUM DIBAYAR', 'COD', '2022-04-14 04:41:48', '2022-04-27 02:50:05', 'TAG-VFZFOVBRPT0=20220414044148', '[[\"24\",\"Gudang SINARBAJA\",\"117\"],[\"24\",\"Gudang Sinar Besi\",\" -5\"]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (8, 9, NULL, '3076285', 'BELUM DIBAYAR', 'COD', '2022-04-18 02:23:46', '2022-04-18 02:23:46', 'TAG-VFZFOVBRPT0=20220418022346', '[[\"28\",\"Gudang SINARBAJA\",\"457\"],[\"28\",\"Gudang Sinar Besi\",\"495\"],[\"30\",\"Gudang SINARBAJA\",\"500\"],[\"30\",\"Gudang Sinar Besi\",\"178\"]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (9, 10, NULL, '3022291', 'BELUM DIBAYAR', 'COD', '2022-04-18 07:19:03', '2022-04-18 07:19:03', 'TAG-VFZFOVBRPT0=20220418071903', '[[\"32\",\"Gudang SINARBAJA\",\"452\"],[\"32\",\"Gudang Sinar Besi\",\"500\"],[\"34\",\"Gudang Sinar Besi\",\"178\"]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (10, 11, NULL, '11182614', 'BELUM DIBAYAR', 'COD', '2022-04-20 04:28:35', '2022-04-20 04:28:35', 'TAG-VFZFOVBRPT0=20220420042835', '[[\"36\",\"Gudang SINARBAJA\",\"647\"],[\"36\",\"Gudang Sinar Besi\",\"500\"],[\"38\",\"Gudang SINARBAJA\",\"491\"],[\"38\",\"Gudang Sinar Besi\",\"478\"]]', NULL, '', 0);
INSERT INTO `tagihans` VALUES (11, 8, 4, '2803315', 'BELUM DIBAYAR', 'COD', '2022-05-11 05:06:42', '2022-05-11 05:15:44', 'TAG-VFZFOVBRPT0=20220511050642', '[[\"26\",\"Gudang SINARBAJA\",\"1129\",\"2\",\"8\"],[\"26\",\"Gudang Sinar Besi\",\"500\",\"3\",\"17\"]]', NULL, '', 2000);

-- ----------------------------
-- Table structure for tbl_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang`;
CREATE TABLE `tbl_barang`  (
  `barang_id` int NOT NULL AUTO_INCREMENT,
  `satuan_id` int NULL DEFAULT NULL,
  `barang_kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barang_nama` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barang_id_parent` int NULL DEFAULT NULL,
  `barang_status_bahan` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barang_alias` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `paper` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barangnama_asli` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`barang_id`) USING BTREE,
  INDEX `satuan_relation`(`satuan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 298 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_barang
-- ----------------------------
INSERT INTO `tbl_barang` VALUES (1, 18, 'LSHAL-229.1-8-6', 'List H kecil Alumunium 22 9,1 0,9 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List H kecil Alumunium 22 9,10,8 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (2, 12, 'LSHAL-408.9-6-6', 'List H besar Alumunium 40 8,9 0,7 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List H besar Alumunium 40 8,9 0,6 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (3, 12, 'LSHAL-408.9-8-6', 'List H besar Alumunium 40 8,9 0.9 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List H besar Alumunium 40 8,9 0.8 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (4, 12, 'LSHAL-408.9-10-6', 'List H besar Alumunium 40 8,9 1.2 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List H besar Alumunium 40 8,9 1 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (5, 12, 'RW/M-235-100-6', 'Rel W/M Alumunium 23,5 10 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Rel W/M Alumunium 23,5 10 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (6, 12, 'RUAL-235-100-109-6', 'Rel U Alumunium 23,5 10 std  6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Rel U Alumunium 23,5 10 std  6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (7, 12, 'RUAL-235-100-121-6', 'Rel U Alumunium 23,5 10 tbl  6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Rel U Alumunium 23,5 10 tbl  6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (8, 12, 'RUAL-235-100-085-6', 'Rel U Alumunium 15,85 4,95 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Rel U Alumunium 15,85 4,95 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (9, 12, 'LSAL-80-90-050', 'List U 3/8 Garis Alumunium 8 9 0,5 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List U 3/8 Garis Alumunium 8 9 0,5 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (10, 12, 'LSAL-90-90-050', 'List U 3/8 Garis Alumunium 9 9 0,5 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List U 3/8 Garis Alumunium 9 9 0,5 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (11, 12, 'LSAL-80-90-060', 'List U 3/8 Garis Alumunium 8 9 0,6 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List U 3/8 Garis Alumunium 8 9 0,6 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (12, 12, 'LSAL-90-90-060', 'List U 3/8 Garis Alumunium 9 9 0,6 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List U 3/8 Garis Alumunium 9 9 0,6 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (13, 12, 'LSAL-12-12-060', 'List U 1/2 Garis Alumunium 1212 0,6 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List U 1/2 Garis Alumunium 1212 0,6 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (14, 12, 'LSAL-15.88-15.88-060', 'List U 5/8 Garis Alumunium 15,88 15,88 0,75 6 CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List U 5/8 Garis Alumunium 15,88 15,88 0,75 6 CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (15, 12, 'LPAL-890-390-060', 'List Plank Alumunium 89 3,9 0,6 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List Plank Alumunium 89 3,9 0,6 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (16, 12, 'LPAL-870-690-070', 'List Plank Alumunium 87 6,9 0,7 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List Plank Alumunium 87 6,9 0,7 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (17, 12, 'LPAL-Double-080', 'List Plank Double Alumunium   0,8 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List Plank Double Alumunium   0,8 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (18, 12, 'LPCAL-165-700-060', 'List Pancing Alumunium 16,5 7 0,6 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List Pancing Alumunium 16,5 7 0,6 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (19, 12, 'LPCAL-210-700-060', 'List Pancing Alumunium 21 7 0,6 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'List Pancing Alumunium 21 7 0,6 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (20, 12, 'JLAL-706-3175-090', 'Jalusi / Louvres Alumunium70,6 31,75 0,9 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Jalusi / Louvres Alumunium70,6 31,75 0,9 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (21, 12, 'JLUAL-500-120-090', 'Jalusi U Alumunium50 12 0,9 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Jalusi U Alumunium50 12 0,9 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (22, 12, 'JPTAL-700-120-060', 'Jepit U 1/2 x 5/16 Alumunium 7 12 0,6 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Jepit U 1/2 x 5/16 Alumunium 7 12 0,6 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (23, 12, 'RGAL-060', 'Rel Gorden Alumunium 0,6 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Rel Gorden Alumunium 0,6 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (24, 12, 'TRP-24-5.2-080', 'Transport Showcase 1\" Alumunium 24 5,2 0.8 6  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Transport Showcase 1\" Alumunium 24 5,2 0.8 6  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (25, 12, 'ALKS-PLSstd-090-585', 'Kaki Showcase/spandrel GEL Polos Alumunium 9cm std  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Polos Alumunium 9cm std  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (26, 12, 'ALKS-KHSstd-090-585', 'Kaki Showcase/spandrel GEL Khusus Alumunium 9cm std  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Khusus Alumunium 9cm std  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (27, 12, 'ALKS-PLSstd-120-585', 'Kaki Showcase/spandrel GEL Polos Alumunium 12cm std  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Polos Alumunium 12cm std  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (28, 12, 'ALKS-KHSstd-120-585', 'Kaki Showcase/spandrel GEL Khusus Alumunium 12cm std  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Khusus Alumunium 12cm std  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (29, 12, 'ALKS-PLSstd-135-585', 'Kaki Showcase/spandrel GEL Polos 13,5cm Alumunium std  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Polos 13,5cm Alumunium std  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (30, 12, 'ALKS-KHSstd-135-585', 'Kaki Showcase/spandrel GEL Khusus 13,5cm Alumunium std  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Khusus 13,5cm Alumunium std  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (31, 12, 'ALKS-PLStbl-090-585', 'Kaki Showcase/spandrel GEL Polos 9cm Alumunium tbl  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Polos 9cm Alumunium tbl  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (32, 12, 'ALKS-KHStbl-090-585', 'Kaki Showcase/spandrel GEL Khusus 9cm Alumunium tbl  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Khusus 9cm Alumunium tbl  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (33, 12, 'ALKS-PLStbl-120-585', 'Kaki Showcase/spandrel GEL Polos 12cm Alumunium tbl  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Polos 12cm Alumunium tbl  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (34, 12, 'ALKS-KHStbl-120-585', 'Kaki Showcase/spandrel GEL Khusus 12cm Alumunium tbl  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Khusus 12cm Alumunium tbl  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (35, 12, 'ALKS-PLStbl-085-585', 'Kaki Showcase/spandrel GEL Polos 8,5cm Alumunium tbl  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Polos 8,5cm Alumunium tbl  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (36, 12, 'ALKS-PLStbl-135-585', 'Kaki Showcase/spandrel GEL Polos 13,5cm Alumunium tbl  5.85  CA', NULL, NULL, 'Pelengkap Alumunium', NULL, 'Kaki Showcase/spandrel GEL Polos 13,5cm Alumunium tbl  5.85  CA', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (37, 12, 'ALSGT-1614-17-6', 'Spigot Alumunium 16x14x2.1x6', NULL, NULL, ' Alumunium', NULL, 'Spigot Alumunium 16x14x1.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (38, 12, 'ALSGT-2314-17-6', 'Spigot Alumunium 23x14x2.1x6', NULL, NULL, ' Alumunium', NULL, 'Spigot Alumunium 23x14x1.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (39, 12, 'ALSGT-2613-14-6', 'Spigot Alumunium 26x13x1.7x6', NULL, NULL, ' Alumunium', NULL, 'Spigot Alumunium 26x13x1.4', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (40, 12, 'ALSGT-2714-17-6', 'Spigot Alumunium 27x14x2.2x6', NULL, NULL, ' Alumunium', NULL, 'Spigot Alumunium 27x14x1.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (41, 12, 'ALSGT-2914-17-6', 'Spigot Alumunium 29x14x2.2x6', NULL, NULL, ' Alumunium', NULL, 'Spigot Alumunium 29x14x1.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (42, 12, 'SKALG-12-050', 'Siku Alumunium Garis 1/2\' (12x0.6x6)', NULL, NULL, ' Alumunium', NULL, 'Siku Alumunium Garis 1/2 (12x0.5x6)', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (43, 12, 'SKAL-16-050', 'Siku Alumunium 3/4\' (16x0.6x6)', NULL, NULL, ' Alumunium', NULL, 'Siku Alumunium 3/4\' (16x0.5x6)', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (44, 12, 'SKALG-12-060', 'Siku Alumunium Garis 1/2\' (12x0.7x6)', NULL, NULL, ' Alumunium', NULL, 'Siku Alumunium Garis 1/2 (12x0.6x6)', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (45, 12, 'SKAL-10-061', 'Siku Alumunium 1/2\' (10x0.7x6)', NULL, NULL, ' Alumunium', NULL, 'Siku Alumunium 1/2\' (10x0.6x6)', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (46, 12, 'SKAL-13-061', 'Siku Alumunium 5/8\' (13x0.7x6)', NULL, NULL, ' Alumunium', NULL, 'Siku Alumunium 5/8\' (13x0.6x6)', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (47, 12, 'SKAL-16-061', 'Siku Alumunium 3/4\' (16x0.7x6)', NULL, NULL, ' Alumunium', NULL, 'Siku Alumunium 3/4\' (16x0.6x6)', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (48, 12, 'SKAL-20-061', 'Siku Alumunium 1\' (20x0.7x6)', NULL, NULL, ' Alumunium', NULL, 'Siku Alumunium 1\' (20x0.6x6)', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (49, 12, 'SKAL-24.5-061', 'Siku Alumunium 1 1/4\' ( 24.5x0.7x6)', NULL, NULL, ' Alumunium', NULL, 'Siku Alumunium 1 1/4\' (24.5x0.6x6)', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (50, 12, 'SKAL-30-061', 'Siku Alumunium 1 1/2\' (30x0.7x6)', NULL, NULL, ' Alumunium', NULL, 'Siku Alumunium 1 1/2 (30x0.6x6)', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (51, 12, 'PSAL-1/2-100-070', 'Plat Strip Alumunium 1/2\'x0.9', NULL, NULL, 'Plat Strip Alumunium', NULL, 'Plat Strip Alumunium 1/2\'x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (52, 12, 'PBAL-25-050', 'Pipa Bulat Alumunium Garis 1\' (25)x0.6x6', NULL, NULL, 'Pipa Bulat Alumunium', NULL, 'Pipa Bulat Alumunium Garis 1\' (25)x0.5x6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (53, 12, 'PBAL-8-050', 'Pipa Bulat Alumunium 3/8\' (8)x0.6x6', NULL, NULL, 'Pipa Bulat Alumunium', NULL, 'Pipa Bulat Alumunium 3/8\' (8)x0.5x6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (54, 12, 'PBAL-23-050', 'Pipa Bulat Alumunium 1\' (23)x0.6x6', NULL, NULL, 'Pipa Bulat Alumunium', NULL, 'Pipa Bulat Alumunium 1\' (23)x0.5x6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (55, 12, 'PBAL-8-060', 'Pipa Bulat Alumunium 3/8\' (8)x0.7x6', NULL, NULL, 'Pipa Bulat Alumunium', NULL, 'Pipa Bulat Alumunium 3/8\' (8)x0.6x6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (56, 12, 'PBAL-12-060', 'Pipa Bulat Alumunium 1/2\' (12)x0.7x6', NULL, NULL, 'Pipa Bulat Alumunium', NULL, 'Pipa Bulat Alumunium 1/2\' (12)x0.6x6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (57, 12, 'PBAL-16-060', 'Pipa Bulat Alumunium 3/4\' (16)x0.7x6', NULL, NULL, 'Pipa Bulat Alumunium', NULL, 'Pipa Bulat Alumunium 3/4\' (16)x0.6x6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (58, 12, 'PBAL-20-060', 'Pipa Bulat Alumunium 7/8\' (20)x0.7x6', NULL, NULL, 'Pipa Bulat Alumunium', NULL, 'Pipa Bulat Alumunium 7/8\' (20)x0.6x6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (59, 12, 'PBAL-23-060', 'Pipa Bulat Alumunium 1\' (23)x0.7x6', NULL, NULL, 'Pipa Bulat Alumunium', NULL, 'Pipa Bulat Alumunium 1\' (23)x0.6x6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (60, 12, 'HAL-1010-050', 'Hollow Alumunium 10x10x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 10x10x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (61, 12, 'HAL-1616-050', 'Hollow Alumunium 16x16x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x16x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (62, 12, 'HAL-22.522.5-050', 'Hollow Alumunium 22.5x22.5x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 22.5x22.5x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (63, 12, 'HAL-2020-050', 'Hollow Alumunium 20x20x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x20x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (64, 12, 'HAL-2311-050', 'Hollow Alumunium 23x11x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x11x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (65, 12, 'HAL-2010-050', 'Hollow Alumunium 20x10x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x10x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (66, 12, 'HAL-2234-050', 'Hollow Alumunium 22x34x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 22x34x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (67, 12, 'HAL-2346-050', 'Hollow Alumunium 23x46x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x46x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (68, 12, 'HAL-1610-050', 'Hollow Alumunium 16x10x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x10x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (69, 12, 'HALOVL-2020-050', 'Hollow Alumunium Oval 20x20x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Oval 20x20x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (70, 12, 'HALOVL-22.522.5-050', 'Hollow Alumunium Oval 22.5x22.5x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Oval 22.5x22.5x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (71, 12, 'HALOVL-2334-050', 'Hollow Alumunium Oval 23x34x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Oval 23x34x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (72, 12, 'HALTK-28.811-050', 'Hollow Alumunium Tanduk 23x11x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x11x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (73, 12, 'HALTK-2332-050', 'Hollow Alumunium Tanduk 23x23x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x23x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (74, 12, 'HALTK-2344-050', 'Hollow Alumunium Tanduk 23x34x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x34x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (75, 12, 'HALTKOVL-2344-050', 'Hollow Alumunium Oval Tanduk 23x34x0.6', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Oval Tanduk 23x34x0.5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (76, 12, 'HAL-1010-060', 'Hollow Alumunium 10x10x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 10x10x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (77, 12, 'HAL-1616-060', 'Hollow Alumunium 16x16x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x16x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (78, 12, 'HAL-22.522.5-060', 'Hollow Alumunium 22.5x22.5x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 22.5x22.5x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (79, 12, 'HAL-2020-060', 'Hollow Alumunium 20x20x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x20x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (80, 12, 'HAL-2311-060', 'Hollow Alumunium 23x11x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x11x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (81, 12, 'HAL-2010-060', 'Hollow Alumunium 20x10x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x10x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (82, 12, 'HAL-2334-060', 'Hollow Alumunium 23x34x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x34x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (83, 12, 'HAL-2346-060', 'Hollow Alumunium 23x46x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x46x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (84, 12, 'HAL-1610-060', 'Hollow Alumunium 16x10x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x10x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (85, 12, 'HALOVL-2020-060', 'Hollow Alumunium Oval 20x20x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Oval 20x20x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (86, 12, 'HALOVL-22.522.5-060', 'Hollow Alumunium Oval 22.5x22.5x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Oval 22.5x22.5x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (87, 12, 'HALOVL-2334-060', 'Hollow Alumunium Oval 23x34x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Oval 23x34x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (88, 12, 'HALTK-28.811-060', 'Hollow Alumunium Tanduk 23x11x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x11x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (89, 12, 'HALTK-2332-060', 'Hollow Alumunium Tanduk 23x23x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x23x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (90, 12, 'HALTK-2344-060', 'Hollow Alumunium Tanduk 23x34x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x34x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (91, 12, 'HALTKOVL-2344-060', 'Hollow Alumunium Oval Tanduk 23x34x0.7', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Oval Tanduk 23x34x0.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (92, 12, 'HAL-1010-070', 'Hollow Alumunium 10x10x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 10x10x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (93, 12, 'HAL-1616-070', 'Hollow Alumunium 16x16x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x16x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (94, 12, 'HAL-22.522.5-070', 'Hollow Alumunium 22.5x22.5x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 22.5x22.5x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (95, 12, 'HAL-2020-070', 'Hollow Alumunium 20x20x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x20x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (96, 12, 'HAL-2111-070', 'Hollow Alumunium 21x11x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 21x11x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (97, 12, 'HAL-2010-070', 'Hollow Alumunium 20x10x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x10x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (98, 12, 'HAL-2334.5-070', 'Hollow Alumunium 23x34.5x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x34.5x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (99, 12, 'HAL-2346-070', 'Hollow Alumunium 23x46x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x46x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (100, 12, 'HAL-1610-070', 'Hollow Alumunium 16x10x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x10x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (101, 12, 'HALTK-28.811-070', 'Hollow Alumunium Tanduk 23x11x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x11x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (102, 12, 'HALTK-2332-070', 'Hollow Alumunium Tanduk 23x23x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x23x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (103, 12, 'HALTK-2344-070', 'Hollow Alumunium Tanduk 23x34x0.8', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x34x0.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (104, 12, 'HAL-1010-080', 'Hollow Alumunium 10x10x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 10x10x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (105, 12, 'HAL-1616-080', 'Hollow Alumunium 16x16x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x16x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (106, 12, 'HAL-22.522.5-080', 'Hollow Alumunium 22.5x22.5x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 22.5x22.5x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (107, 12, 'HAL-2020-080', 'Hollow Alumunium 20x20x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x20x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (108, 12, 'HAL-2111-080', 'Hollow Alumunium 21x11x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 21x11x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (109, 12, 'HAL-2010-080', 'Hollow Alumunium 20x10x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x10x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (110, 12, 'HAL-2334-080', 'Hollow Alumunium 23x34x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x34x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (111, 12, 'HAL-23.546-080', 'Hollow Alumunium 23.5x46x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23.5x46x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (112, 12, 'HAL-1610-080', 'Hollow Alumunium 16x10x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x10x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (113, 12, 'HALTK-28.811-080', 'Hollow Alumunium Tanduk 23x11x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x11x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (114, 12, 'HALTK-2332-080', 'Hollow Alumunium Tanduk 23x23x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x23x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (115, 12, 'HALTK-2344-080', 'Hollow Alumunium Tanduk 23x34x0.9', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x34x0.8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (116, 12, 'HAL-1010-090', 'Hollow Alumunium 10x10x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 10x10x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (117, 12, 'HAL-1616-090', 'Hollow Alumunium 16x16x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x16x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (118, 12, 'HAL-22.522.5-090', 'Hollow Alumunium 22.5x22.5x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 22.5x22.5x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (119, 12, 'HAL-2020-090', 'Hollow Alumunium 20x20x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x20x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (120, 12, 'HAL-2111-090', 'Hollow Alumunium 21x11x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 21x11x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (121, 12, 'HAL-2010-090', 'Hollow Alumunium 20x10x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x10x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (122, 12, 'HAL-2334-090', 'Hollow Alumunium 23x34x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x34x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (123, 12, 'HAL-25.450.8-090', 'Hollow Alumunium 25.4x50.8x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 25.4x50.8x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (124, 12, 'HAL-1610-090', 'Hollow Alumunium 16x10x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x10x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (125, 12, 'HALTK-28.811-090', 'Hollow Alumunium Tanduk 23x11x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x11x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (126, 12, 'HALTK-2332-090', 'Hollow Alumunium Tanduk 23x23x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x23x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (127, 12, 'HALTK-2344-090', 'Hollow Alumunium Tanduk 23x34x1', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x34x0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (128, 12, 'HAL-1010-100', 'Hollow Alumunium 10x10x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 10x10x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (129, 12, 'HAL-1616-100', 'Hollow Alumunium 16x16x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x16x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (130, 12, 'HAL-22.522.5-100', 'Hollow Alumunium 22.5x22.5x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 22.5x22.5x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (131, 12, 'HAL-2020-100', 'Hollow Alumunium 20x20x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x20x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (132, 12, 'HAL-2111-100', 'Hollow Alumunium 21x11x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 21x11x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (133, 12, 'HAL-2010-100', 'Hollow Alumunium 20x10x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x10x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (134, 12, 'HAL-2334-100', 'Hollow Alumunium 23x34x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x34x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (135, 12, 'HAL-2346-100', 'Hollow Alumunium 23x46x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x46x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (136, 12, 'HAL-1610-100', 'Hollow Alumunium 16x10x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x10x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (137, 12, 'HAL-25.4101.6-100', 'Hollow Alumunium 25.4x101.6x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 25.4x101.6x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (138, 12, 'HALTK-28.811-100', 'Hollow Alumunium Tanduk 23x11x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x11x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (139, 12, 'HALTK-2332-100', 'Hollow Alumunium Tanduk 23x23x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x23x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (140, 12, 'HALTK-2344-100', 'Hollow Alumunium Tanduk 23x34x1.2', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x34x1', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (141, 12, 'HAL-1010-120', 'Hollow Alumunium 10x10x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 10x10x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (142, 12, 'HAL-1616-120', 'Hollow Alumunium 16x16x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x16x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (143, 12, 'HAL-22.522.5-120', 'Hollow Alumunium 22.5x22.5x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 22.5x22.5x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (144, 12, 'HAL-2020-120', 'Hollow Alumunium 20x20x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x20x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (145, 12, 'HAL-2111-120', 'Hollow Alumunium 21x11x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 21x10x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (146, 12, 'HAL-2010-120', 'Hollow Alumunium 20x10x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 20x10x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (147, 12, 'HAL-2334-120', 'Hollow Alumunium 23x34x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x34x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (148, 12, 'HAL-2346-120', 'Hollow Alumunium 23.5x46x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 23x46x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (149, 12, 'HAL-1610-120', 'Hollow Alumunium 16x10x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 16x10x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (150, 12, 'HAL-25.4101.6-120', 'Hollow Alumunium 25.4x101.6x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium 25.4x101.6x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (151, 12, 'HALTK-28.811-120', 'Hollow Alumunium Tanduk 23x11x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x11x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (152, 12, 'HALTK-2332-120', 'Hollow Alumunium Tanduk 23x23x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x23x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (153, 12, 'HALTK-2344-120', 'Hollow Alumunium Tanduk 23x34x1.4', NULL, NULL, 'Hollow Alumunium', NULL, 'Hollow Alumunium Tanduk 23x34x1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (154, 13, 'TRAL-1100-22-60', 'Talang rol Alumunium (1100) 60 Std', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.21-0,22', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (155, 13, 'TRAL-1100-25-60', 'Talang rol Alumunium (1100) 60 Std SNI', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.23-0,25', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (156, 13, 'TRAL-1100-34-60', 'Talang rol Alumunium (1100) 60 ET', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.32-0,34', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (157, 13, 'TRAL-1100-35-60', 'Talang rol Alumunium (1100) 60 ET SNI', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.33-0,35', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (158, 13, 'TRAL-1100-37-60', 'Talang rol Alumunium (1100) 60 Super', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.36-0,37', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (159, 13, 'TRAL-1100-43-60', 'Talang rol Alumunium (1100) 60 Gold', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.41-0,43', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (160, 13, 'TRAL-1100-50-60', 'Talang rol Alumunium (1100) 60 PlatinuN', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.47-0,48', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (161, 13, 'TRAL-1100-54-60', 'Talang rol Alumunium (1100) 60x0.7', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.50-0,54', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (162, 13, 'TRAL-1100-64-60', 'Talang rol Alumunium (1100) 60x0.8', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.63-0,64', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (163, 13, 'TRAL-1100-74-60', 'Talang rol Alumunium (1100) 60x0.9', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.71-0,74', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (164, 13, 'TRAL-1100-78-60', 'Talang rol Alumunium (1100) 60x1', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.77-0,78', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (165, 13, 'TRAL-1100-93-60', 'Talang rol Alumunium (1100) 60x1.2', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 60x0.91-0,93', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (166, 13, 'TRAL-1100-93-80', 'Talang rol Alumunium (1100) 80 std', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.21-0,22', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (167, 13, 'TRAL-1100-25-80', 'Talang rol Alumunium (1100) 80 Std SNI', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.23-0,25', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (168, 13, 'TRAL-1100-34-80', 'Talang rol Alumunium (1100) 80 ET', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.32-0,34', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (169, 13, 'TRAL-1100-35-80', 'Talang rol Alumunium (1100) 80 ET SNI', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.33-0,35', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (170, 13, 'TRAL-1100-37-80', 'Talang rol Alumunium (1100) 80 Super', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.36-0,37', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (171, 13, 'TRAL-1100-43-80', 'Talang rol Alumunium (1100) 80 Gold', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.41-0,43', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (172, 13, 'TRAL-1100-50-80', 'Talang rol Alumunium (1100) 80 PlatinuN', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.47-0,48', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (173, 13, 'TRAL-1100-54-80', 'Talang rol Alumunium (1100) 80x0.7', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.50-0,54', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (174, 13, 'TRAL-1100-64-80', 'Talang rol Alumunium (1100) 80x0.8', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.63-0,64', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (175, 13, 'TRAL-1100-74-80', 'Talang rol Alumunium (1100) 80x0.9', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.71-0,74', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (176, 13, 'TRAL-1100-78-80', 'Talang rol Alumunium (1100) 80x1', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.77-0,78', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (177, 13, 'TRAL-1100-93-80', 'Talang rol Alumunium (1100) 80x1.2', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 80x0.91-0,93', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (178, 13, 'TRAL-1100-22-100', 'Talang rol Alumunium (1100) 100 Std', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.21-0,22', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (179, 13, 'TRAL-1100-25-100', 'Talang rol Alumunium (1100) 100 Std SNI', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.23-0,25', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (180, 13, 'TRAL-1100-34-100', 'Talang rol Alumunium (1100) 100 ET', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.32-0,34', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (181, 13, 'TRAL-1100-35-100', 'Talang rol Alumunium (1100) 100 ET SNI', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.33-0,35', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (182, 13, 'TRAL-1100-37-100', 'Talang rol Alumunium (1100) 100 Super', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.36-0,37', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (183, 13, 'TRAL-1100-43-100', 'Talang rol Alumunium (1100) 100 Gold', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.41-0,43', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (184, 13, 'TRAL-1100-50-100', 'Talang rol Alumunium (1100) 100 PlatinuN', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.47-0,48', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (185, 13, 'TRAL-1100-54-100', 'Talang rol Alumunium (1100) 100x0.7', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.50-0,54', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (186, 13, 'TRAL-1100-64-100', 'Talang rol Alumunium (1100) 100x0.8', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.63-0,64', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (187, 13, 'TRAL-1100-74-100', 'Talang rol Alumunium (1100) 100x0.9', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.71-0,74', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (188, 13, 'TRAL-1100-78-100', 'Talang rol Alumunium (1100) 100x1', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.77-0,78', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (189, 13, 'TRAL-1100-93-100', 'Talang rol Alumunium (1100) 100x1.2', NULL, NULL, 'Talang Rol Alumunium', NULL, 'Talang rol Alumunium (1100) 100x0.91-0,93', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (190, 14, 'PAP-1100-160-100/200', 'Plat Alumunium (1100) 100x200x0.2', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.15-0,16', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (191, 14, 'PAP-1100-180-100/200', 'Plat Alumunium (1100) 100x200x0.25', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.17-0,18', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (192, 14, 'PAP-1100-234-100/200', 'Plat Alumunium (1100) 100x200x0.3', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.22-0,25', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (193, 14, 'PAP-1100-249-100/200', 'Plat Alumunium (1100) 100x200x0.35', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.25-0,26', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (194, 14, 'PAP-1100-328-100/200', 'Plat Alumunium (1100) 100x200x0.4', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.32-0,34', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (195, 14, 'PAP-1100-338-100/200', 'Plat Alumunium (1100) 100x200x0.45', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.33-0,35', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (196, 14, 'PAP-1100-410-100/200', 'Plat Alumunium (1100) 100x200x0.5', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.41-0,42', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (197, 14, 'PAP-1100-444-100/200', 'Plat Alumunium (1100) 100x200x0.55', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.44-0,45', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (198, 14, 'PAP-1100-486-100/200', 'Plat Alumunium (1100) 100x200x0.6', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.46-0,48', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (199, 14, 'PAP-1100-527-100/200', 'Plat Alumunium (1100) 100x200x0.65', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.51-0,54', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (200, 14, 'PAP-1100-574-100/200', 'Plat Alumunium (1100) 100x200x0.7', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.55-0,58', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (201, 14, 'PAP-1100-624-100/200', 'Plat Alumunium (1100) 100x200x0.75', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.62-0,63', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (202, 14, 'PAP-1100-700-100/200', 'Plat Alumunium (1100) 100x200x0.8', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.71-0,72', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (203, 14, 'PAP-1100-721-100/200', 'Plat Alumunium (1100) 100x200x0.85', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.72-0,73', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (204, 14, 'PAP-1100-776-100/200', 'Plat Alumunium (1100) 100x200x0.9', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.75-0,79', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (205, 14, 'PAP-1100-892-100/200', 'Plat Alumunium (1100) 100x200x1', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.88-0,91', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (206, 14, 'PAP-1100-920-100/200', 'Plat Alumunium (1100) 100x200x1.1', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.88-0,93', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (207, 14, 'PAP-1100-979-100/200', 'Plat Alumunium (1100) 100x200x1.2', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x0.96-0,98', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (208, 14, 'PAP-1100-1152-100/200', 'Plat Alumunium (1100) 100x200x1.4', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x1.08-1.16', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (209, 14, 'PAP-1100-1200-100/200', 'Plat Alumunium (1100) 100x200x1.5', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x1.18-1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (210, 14, 'PAP-1100-1300-100/200', 'Plat Alumunium (1100) 100x200x1.6', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x1.28-1.3', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (211, 14, 'PAP-1100-1401-100/200', 'Plat Alumunium (1100) 100x200x1.7', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x1.40-1.41', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (212, 14, 'PAP-1100-1477-100/200', 'Plat Alumunium (1100) 100x200x1.8', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x1.46-1.48', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (213, 14, 'PAP-1100-1598-100/200', 'Plat Alumunium (1100) 100x200x2', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x1.58-1.62', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (214, 14, 'PAP-1100-1969-100/200', 'Plat Alumunium (1100) 100x200x2.5', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x1.96-1.99', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (215, 14, 'PAP-1100-2600-100/200', 'Plat Alumunium (1100) 100x200x3', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x2.59-2.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (216, 14, 'PAP-1100-3700-100/200', 'Plat Alumunium (1100) 100x200x4', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x2.59-2.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (217, 14, 'PAP-1100-4540-100/200', 'Plat Alumunium (1100) 100x200x5', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 100x200x4.46-4.64', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (218, 14, 'PAP-1100-425-120/240', 'Plat Alumunium (1100) 120x240x0.6', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x0.41-0.43', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (219, 14, 'PAP-1100-529-120/240', 'Plat Alumunium (1100) 120x240x0.7', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x0.51-0.53', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (220, 14, 'PAP-1100-614-120/240', 'Plat Alumunium (1100) 120x240x0.8', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x0.61-0.64', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (221, 14, 'PAP-1100-711-120/240', 'Plat Alumunium (1100) 120x240x0.9', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x0.71-0.73', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (222, 14, 'PAP-1100-903-120/240', 'Plat Alumunium (1100) 120x240x1', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x0.89-0.91', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (223, 14, 'PAP-1100-971-120/240', 'Plat Alumunium (1100) 120x240x1.2', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x0.96-0.98', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (224, 14, 'PAP-1100-1115-120/240', 'Plat Alumunium (1100) 120x240x1.3', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x1.08-1.12', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (225, 14, 'PAP-1100-1194-120/240', 'Plat Alumunium (1100) 120x240x1.4', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x1.17-1.2', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (226, 14, 'PAP-1100-1696-120/240', 'Plat Alumunium (1100) 120x240x2', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x1.66-1.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (227, 14, 'PAP-1100-1965-120/240', 'Plat Alumunium (1100) 120x240x2.5', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x1.94-1.98', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (228, 14, 'PAP-1100-2563-120/240', 'Plat Alumunium (1100) 120x240x3', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x2.56-2.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (229, 14, 'PAP-1100-2959-120/240', 'Plat Alumunium (1100) 120x240x3.5', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x2.96-3', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (230, 14, 'PAP-1100-3640-120/240', 'Plat Alumunium (1100) 120x240x4', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x3.63-3.65', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (231, 14, 'PAP-1100-4552-120/240', 'Plat Alumunium (1100) 120x240x5', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 120x240x4.55-4.6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (232, 14, 'PAP-1100-720-122/244', 'Plat Alumunium (1100) 122x244x0.9', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 122x244x0.71-0.72', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (233, 14, 'PAP-1100-1347-122/244', 'Plat Alumunium (1100) 122x244x1.6', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 122x244x1.34-1.36', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (234, 14, 'PAP-1100-1465-122/244', 'Plat Alumunium (1100) 122x244x1.7', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 122x244x1.43-1.47', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (235, 14, 'PAP-1100-1774-122/244', 'Plat Alumunium (1100) 122x244x2', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 122x244x1.68-1.7', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (236, 14, 'PAP-1100-1964-122/244', 'Plat Alumunium (1100) 122x244x2.3', NULL, NULL, 'Plat Alumunium', NULL, 'Plat Alumunium (1100) 122x244x1.94-1.98', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (237, 13, 'JLMAL-1-10-C0507', 'Mesh Alumunium Lebar 1m C0507', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m C0507', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (238, 13, 'JLMAL-1-25-E0505', 'Mesh Alumunium Lebar 1m EE0505', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m EE0505', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (239, 13, 'JLMAL-1-25-E0808', 'Mesh Alumunium Lebar 1m EE0808', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m EE0808', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (240, 13, 'JLMAL-1-50-F0510', 'Mesh Alumunium Lebar 1m F0510', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m F0510', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (241, 13, 'JLMAL-1-30-F0808', 'Mesh Alumunium Lebar 1m F0808', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m F0808', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (242, 13, 'JLMAL-1-30-F0810', 'Mesh Alumunium Lebar 1m F0810', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m F0810', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (243, 13, 'JLMAL-1-20-F1010', 'Mesh Alumunium Lebar 1m F1010', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m F1010', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (244, 13, 'JLMAL-1-30-H0808', 'Mesh Alumunium Lebar 1m H0808', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m H0808', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (245, 13, 'JLMAL-1-30-H0810', 'Mesh Alumunium Lebar 1m H0810', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m H0810', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (246, 13, 'JLMAL-1-20-H1010', 'Mesh Alumunium Lebar 1m H1010', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m H1010', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (247, 13, 'JLMAL-1-50-J0808', 'Mesh Alumunium Lebar 1m J0808', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m J0808', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (248, 13, 'JLMAL-1-30-J0810', 'Mesh Alumunium Lebar 1m J0810', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m J0810', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (249, 13, 'JLMAL-1-30-J1010', 'Mesh Alumunium Lebar 1m J1010', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m J1010', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (250, 13, 'JLMAL-1-15-J1015', 'Mesh Alumunium Lebar 1m J1015', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m J1015', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (251, 13, 'JLMAL-1-25-U1015', 'Mesh Alumunium Lebar 1m U1015', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m U1015', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (252, 13, 'JLMAL-1-15-DD1025', 'Mesh Alumunium Lebar 1m DD1025', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m DD1025', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (253, 13, 'JLMAL-1-10-PRM1025', 'Mesh Alumunium Lebar 1m PRM1025', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m PRM1025', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (254, 13, 'JLMAL-1-50-R8', 'Mesh Alumunium Lebar 1m R8', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m R8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (255, 13, 'JLMAL-1-50-R10', 'Mesh Alumunium Lebar 1m R10', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m R10', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (256, 13, 'JLMAL-1-50-T5', 'Mesh Alumunium Lebar 1m T5', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m T5', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (257, 13, 'JLMAL-1-50-T5EK', 'Mesh Alumunium Lebar 1m T5EK', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m T5EK', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (258, 13, 'JLMAL-1-50-S8', 'Mesh Alumunium Lebar 1m S8', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m S8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (259, 13, 'JLMAL-1-50-WRS', 'Mesh Alumunium Lebar 1m WRS', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m WRS', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (260, 13, 'JLMAL-1-50-Qitomesh', 'Mesh Alumunium Lebar 1m Qitomesh', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1m Qitomesh', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (261, 13, 'JLMAL-1.2-25-E0505', 'Mesh Alumunium Lebar 1.2m E0505', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m E0505', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (262, 13, 'JLMAL-1.2-25-E0808', 'Mesh Alumunium Lebar 1.2m E0808', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m E0808', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (263, 13, 'JLMAL-1.2-30-F0510', 'Mesh Alumunium Lebar 1.2m F0510', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m F0510', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (264, 13, 'JLMAL-1.2-30-F0808', 'Mesh Alumunium Lebar 1.2m F0808', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m F0808', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (265, 13, 'JLMAL-1.2-30-F0810', 'Mesh Alumunium Lebar 1.2m F0810', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m F0810', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (266, 13, 'JLMAL-1.2-30-H0808', 'Mesh Alumunium Lebar 1.2m H0808', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m H0808', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (267, 13, 'JLMAL-1.2-30-H0810', 'Mesh Alumunium Lebar 1.2m H0810', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m H0810', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (268, 13, 'JLMAL-1.2-50-R8', 'Mesh Alumunium Lebar 1.2m R8', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m R8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (269, 13, 'JLMAL-1.2-50-R10', 'Mesh Alumunium Lebar 1.2m R10', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m R10', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (270, 13, 'JLMAL-1.2-50-S8', 'Mesh Alumunium Lebar 1.2m S8', NULL, NULL, 'Mesh Alumunium', NULL, 'Mesh Alumunium Lebar 1.2m S8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (271, 12, 'SLCK-6-065-60', 'Slad Coak Alumunium 6cmx6mx0,8', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Coak Alumunium 6cmx6mx0,65', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (272, 12, 'SLCK-6-065-55', 'Slad Coak Alumunium 6cmx5.5mx0,8', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Coak Alumunium 6cmx5.5mx0,65', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (273, 12, 'SLCK-6-065-50', 'Slad Coak Alumunium 6cmx5mx0,8', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Coak Alumunium 6cmx5mx0,65', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (274, 12, 'SLCK-6-065-45', 'Slad Coak Alumunium 6cmx4.5mx0,8', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Coak Alumunium 6cmx4.5mx0,65', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (275, 12, 'SLCK-6-080-60', 'Slad Coak Alumunium 6cmx6mx0,9', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Coak Alumunium 6cmx6mx0,8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (276, 12, 'SLCK-6-080-55', 'Slad Coak Alumunium 6cmx5.5mx0,9', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Coak Alumunium 6cmx5.5mx0,8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (277, 12, 'SLCK-6-080-50', 'Slad Coak Alumunium 6cmx5mx0,9', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Coak Alumunium 6cmx5mx0,8', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (278, 12, 'SCFL-5-060-60', 'Slad Full Alumunium 5cmx6mx0,7', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Full Alumunium 5cmx6mx0,6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (279, 12, 'SCFL-5-060-55', 'Slad Full Alumunium 5cmx5.5mx0,7', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Full Alumunium 5cmx5.5mx0,6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (280, 12, 'SCFL-5-060-50', 'Slad Full Alumunium 5cmx5mx0,7', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Full Alumunium 5cmx5mx0,6', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (281, 12, 'SCFL-5-090-60', 'Slad Full Alumunium 5cmx6mx1', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Full Alumunium 5cmx6mx0,9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (282, 12, 'SCFL-5-090-55', 'Slad Full Alumunium 5cmx5.5mx1', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Full Alumunium 5cmx5.5mx0.9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (283, 12, 'SCFL-5-090-50', 'Slad Full Alumunium 6cmx5mx1', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Slad Full Alumunium 5cmx5mx0,9', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (284, 12, 'GRL--60', 'Get Rel Alumunium 6m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Get Rel Alumunium 6m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (285, 12, 'GRL--55', 'Get Rel Alumunium 5.5m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Get Rel Alumunium 5.5m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (286, 12, 'GRL--50', 'Get Rel Alumunium 5m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Get Rel Alumunium 5m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (287, 12, 'GRL--46', 'Get Rel Alumunium 4.6m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Get Rel Alumunium 4.6m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (288, 12, 'BTM-60', 'Bottom Alumunium 6m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Bottom Alumunium 6m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (289, 12, 'BTM-55', 'Bottom Alumunium 5.5m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Bottom Alumunium 5.5m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (290, 12, 'BTM-50', 'Bottom Alumunium 5m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Bottom Alumunium 5m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (291, 12, 'CPK-60', 'Centre Post Kecil 6m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Centre Post Kecil 6m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (292, 12, 'CPK-55', 'Centre Post Kecil 5.5m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Centre Post Kecil 5.5m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (293, 12, 'CPK-50', 'Centre Post Kecil 5m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Centre Post Kecil 5m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (294, 12, 'CPK-46', 'Centre Post Kecil 4.6m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Centre Post Kecil 4.6m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (295, 12, 'CPB-60', 'Centre Post Besar 6m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Centre Post Besar 6m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (296, 12, 'CPB-55', 'Centre Post Besar 5.5m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Centre Post Besar 5.5m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');
INSERT INTO `tbl_barang` VALUES (297, 12, 'CPB-50', 'Centre Post Besar 5m', NULL, NULL, 'Rolling Door Alumunium', NULL, 'Centre Post Besar 5m', '2022-03-21 09:47:39', '2022-03-21 09:47:39');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `no_induk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@gmail.com', '2022-05-09 04:09:47', '0', '$2y$10$VulwZrlHixRo5HueUQt7jO/QXKIyOec8We7E9PC2J9kKapikAf3/K', NULL, 'admin', '2022-05-09 04:09:47', '2022-05-09 04:09:47');
INSERT INTO `users` VALUES (2, 'Adi Setiawan', 'adisetiawan@gmail.com', '2022-05-09 04:59:13', '20.624/255071', '$2y$10$F5LI6MpnPAx5BRfi4JnzROX82z5SZn/Nc601SrTC7WvuWMglNUmrW', NULL, 'siswa', '2022-05-09 04:59:13', '2022-05-09 04:59:13');
INSERT INTO `users` VALUES (3, 'Bagas Nur Wahyu', 'bagasnurwahyu@gmail.com', '2022-05-09 05:00:07', '21.534/744893', '$2y$10$EbICiEFl8Dca31VQkbL5JOHh7O2vxE4qb54WnxRlyRE.VRzzj3zRC', NULL, 'siswa', '2022-05-09 05:00:07', '2022-05-09 05:00:07');
INSERT INTO `users` VALUES (4, 'Lia Komaria', 'liakomaria@gmail.com', '2022-05-09 05:00:35', '27.663/625442', '$2y$10$JsKZ9mhGIDQvdGwROzaNUeHyH0kmIttgnc512pDSs7GkhUvICE/Vu', NULL, 'siswa', '2022-05-09 05:00:34', '2022-05-09 05:00:34');
INSERT INTO `users` VALUES (5, 'Devina Andayani Putri', 'devinaandayaniputri@gmail.com', '2022-05-09 05:01:03', '35.889/255080', '$2y$10$5kWOanuVQf0a3bVpXHTdUOUEU47oMyxnkz292wNL58MPszrrz3zbG', NULL, 'siswa', '2022-05-09 05:01:03', '2022-05-09 05:01:03');
INSERT INTO `users` VALUES (6, 'Rio Febriansyah', 'riofebriansyah@gmail.com', '2022-05-09 05:01:29', '32.645/756008', '$2y$10$ycaVa5q2HhCLQGbDkf7w8ehNXcA5KjyidCyXbMPgr0Kvkq8Pipzre', NULL, 'siswa', '2022-05-09 05:01:29', '2022-05-09 05:01:29');
INSERT INTO `users` VALUES (7, 'Muhammad Hasan', 'muhammadhasan@gmail.com', '2022-05-09 05:01:56', '27.876/567244', '$2y$10$Xt5UTJqaN9QTuRV3F7kpTO6jOOwm4VTXXrYzeQTWQT.OAUXdp2ocS', NULL, 'siswa', '2022-05-09 05:01:56', '2022-05-09 05:01:56');
INSERT INTO `users` VALUES (8, 'Stevanus Pangkabean', 'stevanuspangkabean@gmail.com', '2022-05-09 05:02:20', '26.526/009546', '$2y$10$lL1SKCBI93QTHAb4nDFIy.qeYbuObuPqiKMisdPlxDE5/iRqC0fWC', NULL, 'siswa', '2022-05-09 05:02:20', '2022-05-09 05:02:20');
INSERT INTO `users` VALUES (9, 'Sinta Ayuningtyas', 'sintaayuningtyas@gmail.com', '2022-05-09 05:03:07', '63.875/009874', '$2y$10$ud7KIkOcui1kjYrMQ/Vi.uU/miEwtgahYfL5xs7AtskF1mJ64v0iW', NULL, 'siswa', '2022-05-09 05:03:07', '2022-05-09 05:03:07');
INSERT INTO `users` VALUES (10, 'Dwi Ryas Rosmanda', 'dwiryasrosmanda@gmail.com', '2022-05-09 05:03:43', '43.204/778092', '$2y$10$cIMzGAjgHyYAFofSMhAr6OAzkcnAAWIrIKTeQAsZt76h7wN4DFW2K', NULL, 'siswa', '2022-05-09 05:03:42', '2022-05-09 05:03:42');
INSERT INTO `users` VALUES (11, 'Risky Lazuardi', 'riskylazuardi@gmail.com', '2022-05-09 05:04:13', '56.891/004003', '$2y$10$2Tao1hOwxnk2s3Jf341VUO21988R3zfDSpr407mrZ/ujaLGTy8O6C', NULL, 'siswa', '2022-05-09 05:04:13', '2022-05-09 05:04:13');
INSERT INTO `users` VALUES (12, 'Habibi Muklas Abror', 'habibimuklasabror@gmail.com', '2022-05-09 05:05:08', '29.775/998523', '$2y$10$GgBG7Eo/iu68DpPQbhcsJe61p9NEcIlrB/XrUTiB9HL/wQBMm9Bka', NULL, 'siswa', '2022-05-09 05:05:07', '2022-05-09 05:05:07');
INSERT INTO `users` VALUES (13, 'Wanda Hammida', 'wandahammida@gmail.com', '2022-05-09 05:05:29', '62.009/846336', '$2y$10$.B.eiBNTGKFWFpLZ7fL5aO.AUxatZWmFWXFCBM3MjFxDRE8cPT8yK', NULL, 'siswa', '2022-05-09 05:05:28', '2022-05-09 05:05:28');
INSERT INTO `users` VALUES (14, 'Angelica Wijaya', 'angelicawijaya@gmail.com', '2022-05-09 05:06:38', '75.948/063994', '$2y$10$M4KrWkIFVJTH0gOQ4OOJrOWczdZiOL8p3OAlJexeMJjakh2enhzyq', NULL, 'siswa', '2022-05-09 05:06:38', '2022-05-09 05:06:38');
INSERT INTO `users` VALUES (15, 'Faris Romansyah', 'farisromansyah@gmail.com', '2022-05-09 05:07:08', '22.764/977643', '$2y$10$1jzWNjyXLr3EYugmtLRZFeQdlVQSLG2IWaZYwbUcO8IOm3UGKgVqC', NULL, 'siswa', '2022-05-09 05:07:08', '2022-05-09 05:07:08');
INSERT INTO `users` VALUES (16, 'Bowo Prasetyo', 'bowoprasetyo@gmail.com', '2022-05-09 05:07:31', '48.364/067112', '$2y$10$q97fR5B0ueX54B1xNxw.PeJhuNoJFkySIekvdRjlmvD6EjWO2eb72', NULL, 'siswa', '2022-05-09 05:07:31', '2022-05-09 05:07:31');
INSERT INTO `users` VALUES (17, 'Agung Priambodo', 'agungpriambodo@gmail.com', '2022-05-09 05:08:12', '67.873/143887', '$2y$10$zcOgS4y5MejZkP2Gta/rSuiPu4eL9/8kyETAbtgQBbBfI2h7Driz.', NULL, 'siswa', '2022-05-09 05:08:12', '2022-05-09 05:08:12');
INSERT INTO `users` VALUES (18, 'Alvina Dwi Eka', 'alvinadwieka@gmail.com', '2022-05-09 05:08:38', '33.976/009246', '$2y$10$dHCEH9TqFTJqASTxbDsLLu.TWhQ8ztCbjGUpvMBhjY7zpEVAePrnC', NULL, 'siswa', '2022-05-09 05:08:38', '2022-05-09 05:08:38');
INSERT INTO `users` VALUES (19, 'Budi Nur Hamzah', 'budinurhamzah@gmail.com', '2022-05-09 05:09:00', '29.435/653585', '$2y$10$oU1P/BiPJSoN.f7Zk.3VyuiYDCpeFS9vfp.E9AjuCup3a/cPPRYIq', NULL, 'siswa', '2022-05-09 05:09:00', '2022-05-09 05:09:00');
INSERT INTO `users` VALUES (20, 'Thoriq Al Jailani', 'thoriqaljailani@gmail.com', '2022-05-09 05:09:30', '55.865/091442', '$2y$10$Lqq0wU7S42/a2N1Oz8AxP.9F/Q9tLbv9yYVU4yIAcqbjaoHEUxpZW', NULL, 'siswa', '2022-05-09 05:09:30', '2022-05-09 05:09:30');
INSERT INTO `users` VALUES (21, 'Rismawati Permata Sari', 'rismawatipermatasari@gmail.com', '2022-05-09 05:09:54', '30.552/876553', '$2y$10$zjKcjb/FQ40o6rw95tTV6OFFoxs5OxUA0XLd6WME3SQ4NhtTq.I3S', NULL, 'siswa', '2022-05-09 05:09:53', '2022-05-09 05:09:53');
INSERT INTO `users` VALUES (22, 'Wisnu Wardana', 'wisnuwardana@gmail.com', '2022-05-09 05:10:20', '10.663/990552', '$2y$10$lbhg7AyL2vE89eNtNUtZDunYvtcuovw6kGKOvqQEkKunaPJjMQP.u', NULL, 'siswa', '2022-05-09 05:10:20', '2022-05-09 05:10:20');
INSERT INTO `users` VALUES (23, 'Diah Ananja Saputri', 'diahananjasaputri@gmail.com', '2022-05-09 05:10:44', '15.732/616030', '$2y$10$DDJLF41j1ze4DR9MDnLZCe8xA2IrqhNPffu706xAFL6VbQsci/GZS', NULL, 'siswa', '2022-05-09 05:10:44', '2022-05-09 05:10:44');
INSERT INTO `users` VALUES (24, 'Nesi Permata Sari', 'nesipermatasari@gmail.com', '2022-05-09 05:11:19', '50.889/003002', '$2y$10$dz9Bltv917bHvqMFoEGG1OySlvEDZh1wsTdiF.PsjrCcE1HQ09sTK', NULL, 'siswa', '2022-05-09 05:11:19', '2022-05-09 05:11:19');
INSERT INTO `users` VALUES (25, 'Ananta Firmansyah', 'anantafirmansyah@gmail.com', '2022-05-09 05:11:43', '75.760/223456', '$2y$10$/tOcnNzjHk/KCyg3kKWCnecKne..ln5cmPuVWt8buYbrFu5jb8eNW', NULL, 'siswa', '2022-05-09 05:11:43', '2022-05-09 05:11:43');
INSERT INTO `users` VALUES (26, 'Muhammad Fery Alfahri', 'muhammadferyalfahri@gmail.com', '2022-05-09 05:12:07', '80.680/560997', '$2y$10$3AIYFWMklmCY05EU1wJqSeIPrAJAq87E7w./2vVImkp5BaS.UNyOe', NULL, 'siswa', '2022-05-09 05:12:07', '2022-05-09 05:12:07');
INSERT INTO `users` VALUES (27, 'Fajar Bintoro S.t.', 'fajaebintoro@gmail.com', '2022-05-09 07:01:55', '01', '$2y$10$PW5nwBL.pJ/Zkk/tegD9g.1B8vzKsIcv0Q3PAltikZCKMImPjfIu.', NULL, 'guru', '2022-05-09 07:01:54', '2022-05-09 07:01:54');
INSERT INTO `users` VALUES (28, 'Budianto S.pd., M.pd.', 'budianto72@gmail.com', '2022-05-09 07:03:10', '02', '$2y$10$dkAPHywQGQB4.Rhs0j3IMOAK8OAIM5sHTpiPjLBjT928tjc3TJxZi', NULL, 'guru', '2022-05-09 07:03:10', '2022-05-09 07:03:10');
INSERT INTO `users` VALUES (29, 'Sri Wahyuni S.pd.', 'sriwahyuni70@gmail.com', '2022-05-09 07:03:56', '03', '$2y$10$NTTcToOlZ3tyxNAX.9mwnO2P59gecXumJphWClTiDx7IxrxJ.ggKK', NULL, 'guru', '2022-05-09 07:03:56', '2022-05-09 07:03:56');
INSERT INTO `users` VALUES (30, 'Wagini S.pd.', 'wagini@gmail.com', '2022-05-09 07:04:25', '04', '$2y$10$VJsZ7Ms9O566uOmb1Ve6re/6ksM2K1ra.HcyfmhUUGaQwHET9Y0tS', NULL, 'guru', '2022-05-09 07:04:25', '2022-05-09 07:04:25');
INSERT INTO `users` VALUES (31, 'Nur Astutik S.pd.', 'nurastutik@gmail.com', '2022-05-09 07:05:00', '05', '$2y$10$BLebpNK.bj1jjiwBc1zNDu7q3NH.75A2aBKRFTk/DsLERMaSFhf/C', NULL, 'guru', '2022-05-09 07:05:00', '2022-05-09 07:05:00');
INSERT INTO `users` VALUES (32, 'Fitri Indayani St, M.pd.', 'fitriindayani@gmail.com', '2022-05-09 07:06:15', '06', '$2y$10$UrnaNiFSp2cAnXOhlCTXSuiJpVNjk3ahpfCJovH0OCRyOPIcXjZGW', NULL, 'guru', '2022-05-09 07:06:15', '2022-05-09 07:06:15');
INSERT INTO `users` VALUES (33, 'Igngatius Paulus S.kom', 'ignatiuspaulus@gmail.com', '2022-05-09 07:07:02', '07', '$2y$10$wWhnUfFc8Tn7K9wEKEbcT.BOXnvb4L55sg6OEQa0aTQq2nrzaVOHm', NULL, 'guru', '2022-05-09 07:07:02', '2022-05-09 07:07:02');
INSERT INTO `users` VALUES (34, 'Pujianto S.pdi', 'pujianto6060@gmail.com', '2022-05-09 07:07:59', '08', '$2y$10$ApT/jyOJajvV/y8Yd/ulK.Pc1xlcDaMOf/ND.GQbtnw/ADreb8Nsu', NULL, 'guru', '2022-05-09 07:07:59', '2022-05-09 07:07:59');

SET FOREIGN_KEY_CHECKS = 1;
