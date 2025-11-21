-- ============================================
-- DATABASE AGROTECH_RIZQIPROJECT
-- Author   : Rizqi (22101122)
-- Project  : Agrotech Marketplace (UTS Web 1)
-- ============================================

-- 1️⃣ Buat Database
CREATE DATABASE IF NOT EXISTS agrotech_db;
USE agrotech_db;

-- ============================================
-- 2️⃣ Tabel USERS (Login, Register, Role)
-- ============================================
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','user') DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tambah data awal Admin dan User
INSERT INTO users (nama, email, password, role) VALUES
('Admin', 'admin@agrotech.com', MD5('admin123'), 'admin'),
('Rizqi', 'rizqi@gmail.com', MD5('user123'), 'user');

-- ============================================
-- 3️⃣ Tabel PRODUK (Produk Pertanian)
-- ============================================
CREATE TABLE IF NOT EXISTS produk (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_produk VARCHAR(150) NOT NULL,
  deskripsi TEXT,
  harga DECIMAL(10,2) NOT NULL,
  kategori VARCHAR(100),
  gambar VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contoh data awal produk
INSERT INTO produk (nama_produk, deskripsi, harga, kategori, gambar) VALUES
('Kayu Jati Premium', 'Kayu jati pilihan terbaik untuk bahan bangunan dan furniture.', 1500000, 'Kayu', 'jati.jpg'),
('Pupuk Organik Cair', 'Pupuk alami untuk kesuburan tanah dan pertumbuhan tanaman lebih baik.', 80000, 'Pertanian', 'pupuk.jpg'),
('Bibit Cengkeh Super', 'Bibit unggul dengan tingkat pertumbuhan cepat dan hasil tinggi.', 12000, 'Bibit', 'cengkeh.jpg');

-- ============================================
-- 4️⃣ Tabel EDUKASI (Artikel & Informasi Kayu)
-- ============================================
CREATE TABLE IF NOT EXISTS edukasi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(150) NOT NULL,
  konten TEXT NOT NULL,
  gambar VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contoh data awal edukasi
INSERT INTO edukasi (judul, konten, gambar) VALUES
('Cara Mengenali Kayu Berkualitas', 'Kayu berkualitas tinggi memiliki serat halus, tidak mudah retak, dan tahan terhadap rayap.', 'edukasi1.jpg'),
('Pentingnya Pupuk Organik untuk Pertanian', 'Pupuk organik memperbaiki struktur tanah, meningkatkan retensi air, dan menjaga kesuburan alami.', 'edukasi2.jpg'),
('Teknik Penanaman Bibit Kayu Jati', 'Bibit jati memerlukan tanah gembur, penyiraman rutin, dan pemupukan alami agar tumbuh optimal.', 'edukasi3.jpg');

-- ============================================
-- 5️⃣ View Gabungan (opsional)
-- ============================================
CREATE OR REPLACE VIEW view_produk_user AS
SELECT 
  p.id AS id_produk,
  p.nama_produk,
  p.harga,
  p.kategori,
  u.nama AS pemilik,
  p.created_at
FROM produk p
LEFT JOIN users u ON u.id = 1;  -- Admin default sebagai pemilik

-- ============================================
-- 6️⃣ Tabel Log Aktivitas (opsional)
-- ============================================
CREATE TABLE IF NOT EXISTS log_aktivitas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  aktivitas VARCHAR(255),
  waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
