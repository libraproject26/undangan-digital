# 🚀 Panduan Setup Sistem Undangan Digital

## 📋 Persiapan

### 1. Software yang Dibutuhkan
- **Laragon** (untuk lokal development)
- **phpMyAdmin** (sudah included di Laragon)
- **Browser** (Chrome, Firefox, Safari, dll)

### 2. Struktur Folder
Pastikan struktur folder sudah benar:
```
undangan-digital/
├── admin/
├── assets/
├── templates/
├── db.php
├── index.php
├── order.php
├── invitation.php
├── database.sql
└── README.md
```

## 🗄️ Setup Database

### 1. Buat Database
1. Buka Laragon
2. Klik "Start All" untuk menjalankan Apache dan MySQL
3. Buka browser dan akses `http://localhost/phpmyadmin`
4. Klik "New" untuk membuat database baru
5. Nama database: `undangan_db`
6. Collation: `utf8mb4_unicode_ci`
7. Klik "Create"

### 2. Import Database
1. Pilih database `undangan_db` yang baru dibuat
2. Klik tab "Import"
3. Klik "Choose File" dan pilih file `database.sql`
4. Klik "Go" untuk mengimport

### 3. Verifikasi Database
Pastikan tabel-tabel berikut sudah dibuat:
- ✅ `undangan` - Data undangan
- ✅ `tamu` - Data tamu dan RSVP
- ✅ `admin` - Data admin
- ✅ `template` - Data template

## ⚙️ Konfigurasi

### 1. Database Connection
Edit file `db.php`:
```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "undangan_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
```

### 2. Upload File
1. Copy semua file ke folder Laragon Anda
2. Biasanya di: `C:\laragon\www\undangan-digital\`
3. Pastikan semua file sudah ter-copy dengan benar

## 🌐 Testing

### 1. Akses Website
- **Website Utama**: `http://localhost/undangan-digital/`
- **Admin Panel**: `http://localhost/undangan-digital/admin/`

### 2. Login Admin
- **Username**: `admin`
- **Password**: `password`

### 3. Test Fitur
1. ✅ Buka halaman utama
2. ✅ Klik "Pesan Sekarang"
3. ✅ Isi form pemesanan
4. ✅ Login ke admin panel
5. ✅ Lihat dashboard admin
6. ✅ Lihat orders
7. ✅ Preview undangan

## 🚀 Deployment ke InfinityFree

### 1. Persiapan Hosting
1. Daftar di [InfinityFree.net](https://infinityfree.net)
2. Buat akun dan verifikasi email
3. Login ke cPanel

### 2. Upload File
1. Buka File Manager di cPanel
2. Masuk ke folder `public_html`
3. Upload semua file (zip dulu untuk memudahkan)
4. Extract file di public_html

### 3. Setup Database di InfinityFree
1. Buka "MySQL Databases" di cPanel
2. Buat database baru (nama akan otomatis dengan prefix)
3. Buat user database baru
4. Assign user ke database
5. Catat informasi database:
   - Host: `sqlXXX.infinityfree.com`
   - Username: `epiz_XXXXXX`
   - Password: `password_anda`
   - Database: `epiz_XXXXXX_undangan_db`

### 4. Update Konfigurasi Database
Edit file `db.php` untuk InfinityFree:
```php
<?php
$host = "sqlXXX.infinityfree.com"; // Ganti dengan host InfinityFree
$user = "epiz_XXXXXX"; // Ganti dengan username database
$pass = "password_anda"; // Ganti dengan password database
$db   = "epiz_XXXXXX_undangan_db"; // Ganti dengan nama database

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
```

### 5. Import Database di InfinityFree
1. Buka phpMyAdmin di cPanel
2. Pilih database yang sudah dibuat
3. Import file `database.sql`

### 6. Testing Online
1. Akses website Anda: `https://namadomain.infinityfreeapp.com`
2. Test semua fitur
3. Login admin panel
4. Buat undangan test

## 🔧 Troubleshooting

### Database Connection Error
```
Error: Koneksi gagal: Access denied for user
```
**Solusi**: Periksa username, password, dan nama database

### File Not Found Error
```
Error: 404 Not Found
```
**Solusi**: Pastikan file sudah di-upload ke folder yang benar

### Permission Denied
```
Error: Permission denied
```
**Solusi**: Set permission folder ke 755 dan file ke 644

### Template Not Loading
```
Error: Template tidak ditemukan
```
**Solusi**: Pastikan file template ada di folder `templates/`

## 📞 Support

Jika mengalami masalah:
1. Cek error log di cPanel
2. Pastikan semua file sudah ter-upload
3. Verifikasi konfigurasi database
4. Test di lokal dulu sebelum deploy

## ✅ Checklist Setup

### Lokal Development
- [ ] Laragon running
- [ ] Database `undangan_db` dibuat
- [ ] File `database.sql` diimport
- [ ] File `db.php` dikonfigurasi
- [ ] Website bisa diakses di `localhost`
- [ ] Admin panel bisa diakses
- [ ] Login admin berhasil
- [ ] Form pemesanan berfungsi
- [ ] Template undangan tampil

### Production (InfinityFree)
- [ ] Akun InfinityFree dibuat
- [ ] File di-upload ke public_html
- [ ] Database dibuat di cPanel
- [ ] File `db.php` dikonfigurasi untuk InfinityFree
- [ ] Database diimport di phpMyAdmin
- [ ] Website bisa diakses online
- [ ] Semua fitur berfungsi normal

---

**Selamat! Sistem undangan digital Anda sudah siap digunakan! 🎉**
