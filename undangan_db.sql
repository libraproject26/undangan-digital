-- Database untuk Sistem Undangan Digital
-- Jalankan script ini di phpMyAdmin untuk membuat database dan tabel

CREATE DATABASE IF NOT EXISTS undangan_db;
USE undangan_db;

-- Tabel untuk menyimpan data undangan
CREATE TABLE IF NOT EXISTS undangan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pasangan VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    tanggal_acara DATE NOT NULL,
    lokasi VARCHAR(500) NOT NULL,
    template VARCHAR(50) NOT NULL DEFAULT 'classic',
    paket VARCHAR(50) NOT NULL DEFAULT 'basic',
    status ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Data tambahan untuk customisasi
    nama_pria VARCHAR(255),
    nama_wanita VARCHAR(255),
    nama_ortu_pria VARCHAR(255),
    nama_ortu_wanita VARCHAR(255),
    alamat_lengkap TEXT,
    waktu_acara TIME,
    kontak_wa VARCHAR(20),
    email VARCHAR(100),
    
    -- Data untuk fitur premium
    musik_url VARCHAR(500),
    galeri_foto JSON,
    map_lokasi VARCHAR(500),
    ucapan_khusus TEXT,
    
    -- Data pembayaran
    harga DECIMAL(10,2),
    status_pembayaran ENUM('pending', 'paid', 'failed') DEFAULT 'pending',
    metode_pembayaran VARCHAR(50),
    bukti_pembayaran VARCHAR(500),
    
    -- Data untuk client dashboard
    access_token VARCHAR(255) UNIQUE,
    total_views INT DEFAULT 0,
    last_viewed TIMESTAMP NULL
);

-- Tabel untuk menyimpan data tamu dan RSVP
CREATE TABLE IF NOT EXISTS tamu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    undangan_id INT NOT NULL,
    nama_tamu VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    no_hp VARCHAR(20),
    status_rsvp ENUM('pending', 'coming', 'not_coming') DEFAULT 'pending',
    jumlah_hadir INT DEFAULT 1,
    ucapan TEXT,
    kategori_tamu ENUM('pihak_a', 'pihak_b', 'umum') DEFAULT 'umum',
    grup_id INT NULL,
    sesi_acara VARCHAR(50) NULL,
    kendaraan VARCHAR(100) NULL,
    jam_kehadiran TIME NULL,
    qr_code VARCHAR(255) NULL,
    sudah_buka_undangan BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (undangan_id) REFERENCES undangan(id) ON DELETE CASCADE
);

-- Tabel untuk admin
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    role ENUM('admin', 'super_admin') DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk template
CREATE TABLE IF NOT EXISTS template (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    deskripsi TEXT,
    preview_image VARCHAR(500),
    harga_basic DECIMAL(10,2) DEFAULT 50000,
    harga_premium DECIMAL(10,2) DEFAULT 100000,
    harga_exclusive DECIMAL(10,2) DEFAULT 200000,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data admin default (password: password)
INSERT INTO admin (username, password, nama_lengkap, email, role) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin@undangandigital.com', 'super_admin');

-- Insert data template default
INSERT INTO template (nama, slug, deskripsi, preview_image, harga_basic, harga_premium, harga_exclusive) VALUES 
('Classic', 'classic', 'Desain klasik dengan sentuhan vintage yang elegan', 'assets/images/template-classic.jpg', 50000, 100000, 200000),
('Modern', 'modern', 'Desain modern minimalis dengan tipografi yang stylish', 'assets/images/template-modern.jpg', 75000, 125000, 250000),
('Luxury', 'luxury', 'Desain mewah dengan aksen emas dan detail premium', 'assets/images/template-luxury.jpg', 100000, 150000, 300000),
('Elegant', 'elegant', 'Desain elegan dengan gradien warna yang memukau', 'assets/images/template-elegant.jpg', 75000, 125000, 250000),
('Minimalist', 'minimalist', 'Desain minimalis yang clean dan modern', 'assets/images/template-minimalist.jpg', 40000, 80000, 150000),
('Vintage', 'vintage', 'Desain vintage dengan sentuhan klasik yang timeless', 'assets/images/template-vintage.jpg', 60000, 110000, 220000);

-- Tabel untuk grup tamu
CREATE TABLE IF NOT EXISTS grup_tamu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    undangan_id INT NOT NULL,
    nama_grup VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (undangan_id) REFERENCES undangan(id) ON DELETE CASCADE
);

-- Tabel untuk add-on
CREATE TABLE IF NOT EXISTS addon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    deskripsi TEXT,
    harga DECIMAL(10,2) NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk add-on undangan
CREATE TABLE IF NOT EXISTS undangan_addon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    undangan_id INT NOT NULL,
    addon_id INT NOT NULL,
    harga_addon DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'active', 'inactive') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (undangan_id) REFERENCES undangan(id) ON DELETE CASCADE,
    FOREIGN KEY (addon_id) REFERENCES addon(id) ON DELETE CASCADE
);

-- Tabel untuk template pesan
CREATE TABLE IF NOT EXISTS template_pesan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    undangan_id INT NOT NULL,
    jenis_pesan ENUM('whatsapp', 'email', 'sms') NOT NULL,
    template_pesan TEXT NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (undangan_id) REFERENCES undangan(id) ON DELETE CASCADE
);

-- Insert data add-on
INSERT INTO addon (nama, slug, deskripsi, harga) VALUES 
('Sistem Sesi', 'sistem_sesi', 'Membatasi/membagi informasi didalam undangan, bisa dibagi sampai 3 sesi', 50000),
('Digital Guestbook & QR Code', 'digital_guestbook', 'QR Code unik untuk setiap tamu untuk check-in otomatis', 150000),
('Custom RSVP', 'custom_rsvp', 'Penyesuaian RSVP sesuai kebutuhan dengan field tambahan', 150000),
('Custom Domain', 'custom_domain', 'Link undangan dengan domain sendiri (.com)', 250000),
('Multi Bahasa - 2 Bahasa', 'multi_bahasa_2', 'Undangan tersedia dalam 2 bahasa', 250000),
('Multi Bahasa - Tambahan', 'multi_bahasa_tambahan', 'Setiap tambahan 1 bahasa', 150000),
('Add Yours Instagram - Katalog', 'add_yours_katalog', 'Desain Add Yours dari katalog yang tersedia', 50000),
('Add Yours Instagram - Custom', 'add_yours_custom', 'Desain Add Yours custom sesuai keinginan', 150000);

-- Insert data undangan contoh
INSERT INTO undangan (nama_pasangan, slug, tanggal_acara, lokasi, template, paket, nama_pria, nama_wanita, nama_ortu_pria, nama_ortu_wanita, alamat_lengkap, waktu_acara, kontak_wa, email, harga, status_pembayaran) VALUES 
('Ahmad & Sari', 'ahmad-sari', '2025-02-14', 'Gedung Serbaguna Kota Jambi', 'classic', 'premium', 'Ahmad Rizki', 'Sari Dewi', 'Bapak Budi & Ibu Siti', 'Bapak Agus & Ibu Rina', 'Jl. Gatot Subroto No. 123, Kota Jambi', '19:00:00', '081234567890', 'ahmad.sari@email.com', 100000, 'paid'),
('Rizky & Diana', 'rizky-diana', '2025-03-15', 'Hotel Grand Jambi', 'modern', 'exclusive', 'Rizky Pratama', 'Diana Putri', 'Bapak Joko & Ibu Susi', 'Bapak Bambang & Ibu Lina', 'Jl. Sudirman No. 456, Kota Jambi', '18:30:00', '081234567891', 'rizky.diana@email.com', 200000, 'paid');
