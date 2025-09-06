# 🎉 Sistem Undangan Digital

Sistem undangan digital yang dibuat dengan PHP native yang terstruktur, cocok untuk hosting gratis seperti InfinityFree.

## ✨ Fitur Utama

- **3 Template Menarik**: Classic, Modern, dan Luxury dengan harga berbeda
- **3 Paket Layanan**: Basic, Premium, dan Exclusive dengan fitur berbeda
- **Admin Panel Lengkap**: Dashboard, Orders Management, Client Management
- **Client Dashboard**: Dashboard khusus untuk pemilik acara dengan statistik tamu
- **Sistem RSVP**: Form konfirmasi kehadiran dengan tracking lengkap
- **Masa Aktif 1 Tahun**: Undangan aktif selama 1 tahun dari tanggal acara
- **E-Katalog Harga**: Halaman khusus untuk melihat semua harga template
- **Responsive Design**: Tampilan menarik di semua device
- **Fitur Interaktif**: RSVP, Share Button, Animasi
- **Database Terstruktur**: MySQL dengan relasi yang baik

## 🚀 Cara Setup (Lokal dengan Laragon)

### 1. Persiapan Database
1. Buka phpMyAdmin di Laragon
2. Buat database baru dengan nama `undangan_db`
3. Import file `database.sql` atau jalankan script SQL yang ada di file tersebut

### 2. Konfigurasi Database
Edit file `db.php` sesuai dengan konfigurasi database Anda:
```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "undangan_db";
```

### 3. Upload File
1. Copy semua file ke folder proyek Laragon Anda
2. Pastikan struktur folder sudah benar

### 4. Akses Website
- **Website Utama**: `http://localhost/undangan-digital/`
- **Admin Panel**: `http://localhost/undangan-digital/admin/`
- **Login Admin**: username: `admin`, password: `password`

## 📁 Struktur File

```
undangan-digital/
├── admin/                 # Panel Admin
│   ├── login.php         # Login Admin
│   ├── dashboard.php     # Dashboard Admin
│   ├── orders.php        # Management Orders
│   ├── clients.php       # Management Clients
│   ├── templates.php     # Management Templates
│   └── logout.php        # Logout
├── assets/               # Assets (CSS, JS, Images)
│   └── image/
│       └── favicon.png
├── templates/            # Template Undangan
│   ├── classic.php      # Template Classic
│   ├── modern.php       # Template Modern
│   ├── luxury.php       # Template Luxury
│   └── index.php        # Index Templates
├── db.php               # Koneksi Database
├── index.php            # Halaman Utama
├── order.php            # Form Pemesanan
├── invitation.php       # Tampilan Undangan
├── rsvp.php             # Form RSVP Tamu
├── client-dashboard.php # Dashboard Pemilik Acara
├── manage-guests.php    # Kelola Tamu
├── addon.php            # Pilih Add-on
├── custom-rsvp.php      # Konfigurasi Custom RSVP
├── digital-guestbook.php # Digital Guestbook & QR Code
├── send-dashboard-access.php # Kirim Akses Dashboard
├── pricing.php          # E-Katalog Harga
├── database.sql         # Script Database
├── README.md           # Dokumentasi
└── SETUP.md            # Panduan Setup
```

## 🎨 Template Undangan

### 1. Classic Template
- Desain klasik dengan sentuhan vintage
- Warna warm (amber, orange, yellow)
- Animasi floating hearts
- Cocok untuk pernikahan tradisional

### 2. Modern Template
- Desain modern minimalis
- Warna cool (blue, purple, indigo)
- Animasi floating elements
- Cocok untuk pernikahan kontemporer

### 3. Luxury Template
- Desain mewah dengan aksen emas
- Warna luxury (gold, amber, orange)
- Animasi sparkle effects
- Cocok untuk pernikahan premium

## 💰 Paket Layanan & Harga

### Template Classic
- **Basic**: Rp 50.000
- **Premium**: Rp 100.000  
- **Exclusive**: Rp 200.000

### Template Modern
- **Basic**: Rp 75.000
- **Premium**: Rp 125.000
- **Exclusive**: Rp 250.000

### Template Luxury
- **Basic**: Rp 100.000
- **Premium**: Rp 150.000
- **Exclusive**: Rp 300.000

### Fitur Paket
- **Basic**: Template standar, Custom nama & tanggal, Dashboard client, Masa aktif 1 tahun
- **Premium**: Template premium, Musik & animasi, RSVP lengkap, Galeri foto (5 foto), Masa aktif 1 tahun
- **Exclusive**: Custom desain full, Semua fitur premium, Galeri unlimited, Countdown timer, Google Maps, Revisi 3x

## 🔧 Fitur Admin Panel

### Dashboard
- Statistik total undangan
- Jumlah pending/completed
- Total revenue
- Recent orders

### Orders Management
- Lihat semua pesanan
- Update status pesanan
- Preview undangan
- Kirim akses dashboard ke client
- Detail informasi customer

### Client Management
- Data pelanggan
- History pesanan
- Kontak information

### Templates Management
- Lihat semua template
- Statistik penggunaan template
- Preview template

## 👥 Fitur Client Dashboard

### Dashboard Pemilik Acara
- Statistik tamu dan RSVP
- Jumlah tamu yang akan hadir/tidak hadir
- Daftar lengkap tamu dengan status
- Link untuk membagikan undangan
- Tracking views undangan

### Kelola Tamu
- Tambah/hapus tamu dengan mudah
- Kelompokkan tamu berdasarkan kategori (pihak A/B)
- Fitur grup tamu untuk RSVP bersama
- Template pesan WhatsApp otomatis
- Tombol salin link dan kirim WhatsApp

### Sistem RSVP
- Form konfirmasi kehadiran untuk tamu
- Tracking status kehadiran
- Ucapan dan doa dari tamu
- Statistik real-time

### Masa Aktif
- Undangan aktif selama 1 tahun dari tanggal acara
- Otomatis expire setelah 1 tahun
- Dashboard tetap bisa diakses selama masa aktif

## 🔧 Fitur Add-on

### Sistem Sesi (Rp 50.000)
- Membagi informasi undangan sampai 3 sesi
- Tamu sesi 1 melihat info Akad, sesi 2 melihat Akad & Resepsi
- Kategorisasi tamu berdasarkan sesi

### Digital Guestbook & QR Code (Rp 150.000)
- QR Code unik untuk setiap tamu
- Check-in otomatis saat hari H
- Scanner QR Code untuk admin
- Laporan kehadiran real-time
- Print dan download QR Code

### Custom RSVP (Rp 150.000)
- Field tambahan sesuai kebutuhan
- Opsi RSVP yang dapat disesuaikan
- Field untuk jenis kendaraan, kebutuhan diet, dll
- Pilihan sesi acara (Akad/Resepsi)

### Custom Domain (Rp 250.000)
- Link undangan dengan domain sendiri
- Contoh: www.Wedding-Ria-Rio.com
- Lebih personal dan mudah diingat

### Multi Bahasa (Rp 250.000)
- Undangan tersedia dalam 2 bahasa
- Tamu dapat memilih bahasa saat pertama buka
- Tambahan bahasa: Rp 150.000 per bahasa

### Add Yours Instagram
- Desain Katalog: Rp 50.000
- Desain Custom: Rp 150.000
- Alternatif filter Instagram yang sudah dinonaktifkan

## 📱 Fitur Responsive

- **Mobile First Design**: Optimized untuk mobile
- **Touch Friendly**: Button dan link mudah di-tap
- **Fast Loading**: Optimized untuk kecepatan
- **Cross Browser**: Compatible dengan semua browser modern

## 🚀 Deployment ke InfinityFree

### 1. Persiapan Hosting
1. Daftar di InfinityFree.net
2. Buat subdomain atau gunakan domain yang sudah ada
3. Akses cPanel

### 2. Upload File
1. Upload semua file ke public_html
2. Pastikan struktur folder sama dengan lokal

### 3. Setup Database
1. Buat database di cPanel
2. Import file `database.sql`
3. Update konfigurasi database di `db.php`:
```php
$host = "sqlXXX.infinityfree.com"; // Ganti dengan host InfinityFree
$user = "epiz_XXXXXX"; // Ganti dengan username database
$pass = "password_database"; // Ganti dengan password database
$db   = "epiz_XXXXXX_undangan_db"; // Ganti dengan nama database
```

### 4. Testing
1. Akses website Anda
2. Test semua fitur
3. Test admin panel

## 🛠️ Customization

### Menambah Template Baru
1. Buat file PHP baru di folder `templates/`
2. Gunakan variable `$data` untuk mengakses data dari database
3. Tambahkan template ke database di tabel `template`

### Mengubah Warna/Desain
- Edit file CSS di setiap template
- Gunakan Tailwind CSS classes
- Sesuaikan dengan brand Anda

### Menambah Fitur
- Edit file PHP sesuai kebutuhan
- Tambahkan field baru di database
- Update form dan tampilan

## 📞 Support

Jika ada pertanyaan atau butuh bantuan:
- Email: support@undangandigital.com
- WhatsApp: +84 56 318 5476

## 📄 License

Project ini dibuat untuk keperluan komersial. Silakan gunakan dengan bijak dan sesuai dengan kebutuhan Anda.

---

**Selamat menggunakan sistem undangan digital! 🎉**
