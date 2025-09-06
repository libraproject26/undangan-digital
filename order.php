<?php
include 'db.php';

// Handle form submission
if ($_POST && isset($_POST['submit'])) {
    $nama_pasangan = $_POST['nama_pasangan'];
    $nama_pria = $_POST['nama_pria'];
    $nama_wanita = $_POST['nama_wanita'];
    $nama_ortu_pria = $_POST['nama_ortu_pria'];
    $nama_ortu_wanita = $_POST['nama_ortu_wanita'];
    $tanggal_acara = $_POST['tanggal_acara'];
    $waktu_acara = $_POST['waktu_acara'];
    $lokasi = $_POST['lokasi'];
    $alamat_lengkap = $_POST['alamat_lengkap'];
    $template = $_POST['template'];
    $paket = $_POST['paket'];
    $kontak_wa = $_POST['kontak_wa'];
    $email = $_POST['email'];
    $ucapan_khusus = $_POST['ucapan_khusus'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    
    // Generate slug
    $slug = strtolower(str_replace(' ', '-', $nama_pasangan)) . '-' . date('Ymd');
    
    // Generate access token untuk client dashboard
    $access_token = bin2hex(random_bytes(32));
    
    // Set harga berdasarkan template dan paket
    $harga = 0;
    switch($template) {
        case 'classic':
            switch($paket) {
                case 'basic': $harga = 50000; break;
                case 'premium': $harga = 100000; break;
                case 'exclusive': $harga = 200000; break;
            }
            break;
        case 'modern':
            switch($paket) {
                case 'basic': $harga = 75000; break;
                case 'premium': $harga = 125000; break;
                case 'exclusive': $harga = 250000; break;
            }
            break;
        case 'luxury':
            switch($paket) {
                case 'basic': $harga = 100000; break;
                case 'premium': $harga = 150000; break;
                case 'exclusive': $harga = 300000; break;
            }
            break;
        case 'elegant':
            switch($paket) {
                case 'basic': $harga = 75000; break;
                case 'premium': $harga = 125000; break;
                case 'exclusive': $harga = 250000; break;
            }
            break;
        case 'minimalist':
            switch($paket) {
                case 'basic': $harga = 40000; break;
                case 'premium': $harga = 80000; break;
                case 'exclusive': $harga = 150000; break;
            }
            break;
        case 'vintage':
            switch($paket) {
                case 'basic': $harga = 60000; break;
                case 'premium': $harga = 110000; break;
                case 'exclusive': $harga = 220000; break;
            }
            break;
    }
    
    // Insert ke database
    $sql = "INSERT INTO undangan (nama_pasangan, slug, nama_pria, nama_wanita, nama_ortu_pria, nama_ortu_wanita, tanggal_acara, waktu_acara, lokasi, alamat_lengkap, template, paket, kontak_wa, email, ucapan_khusus, harga, access_token, metode_pembayaran) VALUES ('$nama_pasangan', '$slug', '$nama_pria', '$nama_wanita', '$nama_ortu_pria', '$nama_ortu_wanita', '$tanggal_acara', '$waktu_acara', '$lokasi', '$alamat_lengkap', '$template', '$paket', '$kontak_wa', '$email', '$ucapan_khusus', '$harga', '$access_token', '$metode_pembayaran')";
    
    if (mysqli_query($conn, $sql)) {
        $success = "Pesanan berhasil dibuat! ID Pesanan: " . mysqli_insert_id($conn);
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Order Undangan Digital</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="assets/image/favicon.png" type="image/png">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            heading: ['Playfair Display', 'serif'],
            body: ['Poppins', 'sans-serif'],
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
            'fadeIn': 'fadeIn 0.5s ease-in-out',
            'slideUp': 'slideUp 0.5s ease-out',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-20px)' },
            },
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' },
            },
            slideUp: {
              '0%': { transform: 'translateY(20px)', opacity: '0' },
              '100%': { transform: 'translateY(0)', opacity: '1' },
            }
          }
        }
      }
    }
  </script>
  <style>
    .gradient-text {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .form-section {
      transition: all 0.3s ease;
    }

    .form-section:hover {
      transform: translateY(-2px);
    }

    .input-group {
      position: relative;
    }

    .input-group input:focus + label,
    .input-group textarea:focus + label,
    .input-group select:focus + label {
      transform: translateY(-20px) scale(0.8);
      color: #667eea;
    }

    html, body {
      overflow-x: hidden;
      overflow-y: auto;
    }

    .floating-label {
      position: absolute;
      top: 16px;
      left: 16px;
      background: white;
      padding: 0 8px;
      transition: all 0.3s ease;
      pointer-events: none;
      color: #6b7280;
      z-index: 10;
    }

    .input-group input:focus + label,
    .input-group textarea:focus + label,
    .input-group select:focus + label,
    .input-group input:not(:placeholder-shown) + label,
    .input-group textarea:not(:placeholder-shown) + label,
    .input-group select:not([value=""]) + label {
      transform: translateY(-20px) scale(0.8);
      color: #667eea;
      background: white;
      z-index: 20;
    }

    .card-hover {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .step-indicator {
      position: relative;
    }

    .step-indicator::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 2px;
      background: #e5e7eb;
      z-index: 1;
    }

    .step-indicator.active::before {
      background: linear-gradient(90deg, #667eea, #764ba2);
    }

    .step-number {
      position: relative;
      z-index: 2;
      background: white;
      border: 3px solid #e5e7eb;
      transition: all 0.3s ease;
    }

    .step-number.active {
      border-color: #667eea;
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
    }

    .animated-bg {
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .payment-method-card {
      transition: all 0.3s ease;
    }

    .payment-method-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .payment-method-card.selected {
      border-color: #667eea;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
    }

    .payment-method-card.selected h4,
    .payment-method-card.selected p {
      color: white;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-pink-50 to-purple-50 font-body py-8 relative">
  
  <!-- Background decoration -->
  <div class="absolute inset-0 opacity-5">
    <div class="absolute top-20 left-20 w-40 h-40 bg-purple-500 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-20 w-60 h-60 bg-pink-500 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full blur-3xl"></div>
  </div>
  
  <!-- Header -->
  <div class="max-w-6xl mx-auto px-4 mb-12 relative z-10">
    <div class="text-center">
      <div class="mb-6">
        <span class="inline-block px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-600 rounded-full text-sm font-medium mb-4">
          📝 Form Pemesanan
        </span>
      </div>
      <h1 class="text-6xl font-heading font-bold mb-6 gradient-text">Form Pemesanan</h1>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
        Isi form di bawah ini untuk membuat undangan digital yang memukau dan tak terlupakan
      </p>
    </div>
  </div>

  <!-- Alert Messages -->
  <?php if (isset($success)): ?>
    <div class="max-w-6xl mx-auto px-4 mb-8 relative z-10">
      <div class="bg-gradient-to-r from-green-100 to-emerald-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl shadow-lg animate-fadeIn">
        <div class="flex items-center">
          <i class="fas fa-check-circle mr-3 text-xl"></i>
          <span class="font-semibold"><?= $success ?></span>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (isset($error)): ?>
    <div class="max-w-6xl mx-auto px-4 mb-8 relative z-10">
      <div class="bg-gradient-to-r from-red-100 to-pink-100 border border-red-400 text-red-700 px-6 py-4 rounded-2xl shadow-lg animate-fadeIn">
        <div class="flex items-center">
          <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
          <span class="font-semibold"><?= $error ?></span>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Form -->
  <div class="max-w-6xl mx-auto px-4 relative z-10">
    <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 card-hover">
      <form method="POST" class="space-y-8">
        
        <!-- Informasi Pasangan -->
        <div class="border-b border-gray-200 pb-8 form-section">
          <div class="flex items-center mb-8">
            <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-heart text-white text-xl"></i>
            </div>
            <div>
              <h2 class="text-3xl font-heading font-bold text-gray-800">Informasi Pasangan</h2>
              <p class="text-gray-600">Data lengkap pasangan yang akan menikah</p>
            </div>
          </div>
          
          <div class="grid md:grid-cols-2 gap-8">
            <div class="input-group">
              <input type="text" name="nama_pasangan" required 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white"
                     placeholder=" ">
              <label class="floating-label text-gray-600 font-medium">Nama Lengkap Pasangan</label>
              <p class="text-sm text-gray-500 mt-2">Contoh: Ahmad & Sari</p>
            </div>
            
            <div class="input-group">
              <input type="text" name="nama_pria" required 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white"
                     placeholder=" ">
              <label class="floating-label text-gray-600 font-medium">Nama Pria</label>
              <p class="text-sm text-gray-500 mt-2">Nama lengkap pria</p>
            </div>
            
            <div class="input-group">
              <input type="text" name="nama_wanita" required 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white"
                     placeholder=" ">
              <label class="floating-label text-gray-600 font-medium">Nama Wanita</label>
              <p class="text-sm text-gray-500 mt-2">Nama lengkap wanita</p>
            </div>
            
            <div class="input-group">
              <input type="text" name="nama_ortu_pria" 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white"
                     placeholder=" ">
              <label class="floating-label text-gray-600 font-medium">Nama Orang Tua Pria</label>
              <p class="text-sm text-gray-500 mt-2">Bapak ... & Ibu ...</p>
            </div>
            
            <div class="input-group">
              <input type="text" name="nama_ortu_wanita" 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white"
                     placeholder=" ">
              <label class="floating-label text-gray-600 font-medium">Nama Orang Tua Wanita</label>
              <p class="text-sm text-gray-500 mt-2">Bapak ... & Ibu ...</p>
            </div>
          </div>
        </div>

        <!-- Informasi Acara -->
        <div class="border-b border-gray-200 pb-8 form-section">
          <div class="flex items-center mb-8">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-calendar-alt text-white text-xl"></i>
            </div>
            <div>
              <h2 class="text-3xl font-heading font-bold text-gray-800">Informasi Acara</h2>
              <p class="text-gray-600">Detail waktu dan tempat acara pernikahan</p>
            </div>
          </div>
          
          <div class="grid md:grid-cols-2 gap-8">
            <div class="input-group">
              <input type="date" name="tanggal_acara" required 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white">
              <label class="floating-label text-gray-600 font-medium">Tanggal Acara</label>
            </div>
            
            <div class="input-group">
              <input type="time" name="waktu_acara" 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white">
              <label class="floating-label text-gray-600 font-medium">Waktu Acara</label>
            </div>
            
            <div class="input-group md:col-span-2">
              <input type="text" name="lokasi" required 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white"
                     placeholder=" ">
              <label class="floating-label text-gray-600 font-medium">Nama Venue/Lokasi</label>
              <p class="text-sm text-gray-500 mt-2">Contoh: Gedung Serbaguna Kota Jambi</p>
            </div>
            
            <div class="input-group md:col-span-2">
              <textarea name="alamat_lengkap" rows="3" 
                        class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white resize-none"
                        placeholder=" "></textarea>
              <label class="floating-label text-gray-600 font-medium">Alamat Lengkap</label>
              <p class="text-sm text-gray-500 mt-2">Jl. Nama Jalan No. XX, Kota, Provinsi</p>
            </div>
          </div>
        </div>

        <!-- Pilihan Template & Paket -->
        <div class="border-b border-gray-200 pb-8 form-section">
          <div class="flex items-center mb-8">
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-palette text-white text-xl"></i>
            </div>
            <div>
              <h2 class="text-3xl font-heading font-bold text-gray-800">Pilihan Template & Paket</h2>
              <p class="text-gray-600">Pilih desain dan paket yang sesuai dengan kebutuhan Anda</p>
            </div>
          </div>
          
          <div class="grid md:grid-cols-2 gap-8">
            <div class="input-group">
              <select name="template" required 
                      class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white">
                <option value="">Pilih Template</option>
                <option value="classic">Classic - Desain klasik elegan</option>
                <option value="modern">Modern - Desain modern minimalis</option>
                <option value="luxury">Luxury - Desain mewah premium</option>
              </select>
              <label class="floating-label text-gray-600 font-medium">Template</label>
            </div>
            
            <div class="input-group">
              <select name="paket" required 
                      class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white"
                      onchange="updatePrice()">
                <option value="">Pilih Paket</option>
                <option value="basic">Basic</option>
                <option value="premium">Premium</option>
                <option value="exclusive">Exclusive</option>
              </select>
              <label class="floating-label text-gray-600 font-medium">Paket</label>
              <div id="price-display" class="mt-3 p-4 bg-gradient-to-r from-purple-100 to-pink-100 rounded-xl text-center">
                <span class="text-2xl font-bold text-purple-600">Pilih template dan paket untuk melihat harga</span>
              </div>
            </div>
          </div>
          
          <!-- Paket Features -->
          <div class="mt-8 grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl border border-gray-200 card-hover">
              <div class="text-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-gray-600 to-gray-800 rounded-full flex items-center justify-center mx-auto mb-3">
                  <i class="fas fa-star text-white text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Basic</h4>
                <p class="text-gray-600 text-sm">Paket standar untuk acara sederhana</p>
              </div>
              <ul class="text-sm text-gray-600 space-y-2">
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Template standar</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Custom nama & tanggal</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Masa aktif 1 tahun</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Dashboard client</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Kelola tamu</li>
              </ul>
            </div>
            
            <div class="p-6 bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl border-2 border-yellow-300 card-hover relative">
              <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-4 py-1 rounded-full text-sm font-bold">POPULAR</span>
              </div>
              <div class="text-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-3">
                  <i class="fas fa-crown text-white text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Premium</h4>
                <p class="text-gray-600 text-sm">Paket lengkap dengan fitur interaktif</p>
              </div>
              <ul class="text-sm text-gray-600 space-y-2">
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Template premium</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Musik & animasi</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Fitur RSVP lengkap</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Galeri foto (5 foto)</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Masa aktif 1 tahun</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Kelola tamu & grup</li>
              </ul>
            </div>
            
            <div class="p-6 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl border-2 border-purple-300 card-hover">
              <div class="text-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-3">
                  <i class="fas fa-gem text-white text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Exclusive</h4>
                <p class="text-gray-600 text-sm">Paket mewah dengan desain custom</p>
              </div>
              <ul class="text-sm text-gray-600 space-y-2">
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Custom desain full</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Semua fitur premium</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Galeri unlimited</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Countdown timer</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Google Maps</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Masa aktif 1 tahun</li>
                <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Kelola tamu lengkap</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Kontak & Ucapan -->
        <div class="border-b border-gray-200 pb-8 form-section">
          <div class="flex items-center mb-8">
            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-phone text-white text-xl"></i>
            </div>
            <div>
              <h2 class="text-3xl font-heading font-bold text-gray-800">Kontak & Ucapan Khusus</h2>
              <p class="text-gray-600">Informasi kontak dan pesan khusus untuk tamu</p>
            </div>
          </div>
          
          <div class="grid md:grid-cols-2 gap-8">
            <div class="input-group">
              <input type="tel" name="kontak_wa" 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white"
                     placeholder=" ">
              <label class="floating-label text-gray-600 font-medium">Nomor WhatsApp</label>
              <p class="text-sm text-gray-500 mt-2">+84 56 318 5476</p>
            </div>
            
            <div class="input-group">
              <input type="email" name="email" 
                     class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white"
                     placeholder=" ">
              <label class="floating-label text-gray-600 font-medium">Email</label>
              <p class="text-sm text-gray-500 mt-2">email@example.com</p>
            </div>
            
            <div class="input-group md:col-span-2">
              <textarea name="ucapan_khusus" rows="4" 
                        class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-gray-50 focus:bg-white resize-none"
                        placeholder=" "></textarea>
              <label class="floating-label text-gray-600 font-medium">Ucapan Khusus (Opsional)</label>
              <p class="text-sm text-gray-500 mt-2">Tuliskan ucapan khusus yang ingin disampaikan kepada tamu...</p>
            </div>
          </div>
        </div>

        <!-- Method Pembayaran -->
        <div class="pb-8 form-section">
          <div class="flex items-center mb-8">
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-credit-card text-white text-xl"></i>
            </div>
            <div>
              <h2 class="text-3xl font-heading font-bold text-gray-800">Method Pembayaran</h2>
              <p class="text-gray-600">Pilih metode pembayaran yang paling nyaman untuk Anda</p>
            </div>
          </div>
          
          <div class="grid md:grid-cols-3 gap-6">
            <div class="payment-method-card p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border-2 border-blue-200 card-hover cursor-pointer" onclick="selectPaymentMethod('bank_transfer')">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                  <i class="fas fa-university text-white text-2xl"></i>
                </div>
                <h4 class="text-lg font-bold text-gray-800 mb-2">Bank Transfer</h4>
                <p class="text-sm text-gray-600 mb-4">Transfer ke rekening bank</p>
                <div class="text-xs text-gray-500">
                  <p>BCA: 1234567890</p>
                  <p>Mandiri: 0987654321</p>
                  <p>BNI: 1122334455</p>
                </div>
              </div>
            </div>
            
            <div class="payment-method-card p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border-2 border-green-200 card-hover cursor-pointer" onclick="selectPaymentMethod('e_wallet')">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                  <i class="fas fa-mobile-alt text-white text-2xl"></i>
                </div>
                <h4 class="text-lg font-bold text-gray-800 mb-2">E-Wallet</h4>
                <p class="text-sm text-gray-600 mb-4">DANA, OVO, GoPay, Shopeepay</p>
                <div class="text-xs text-gray-500">
                  <p>DANA: 081234567890</p>
                  <p>OVO: 081234567890</p>
                  <p>GoPay: 081234567890</p>
                </div>
              </div>
            </div>
            
            <div class="payment-method-card p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl border-2 border-purple-200 card-hover cursor-pointer" onclick="selectPaymentMethod('whatsapp')">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                  <i class="fab fa-whatsapp text-white text-2xl"></i>
                </div>
                <h4 class="text-lg font-bold text-gray-800 mb-2">WhatsApp</h4>
                <p class="text-sm text-gray-600 mb-4">Konfirmasi via WhatsApp</p>
                <div class="text-xs text-gray-500">
                  <p>+84 56 318 5476</p>
                  <p>Kirim bukti transfer</p>
                  <p>Konfirmasi manual</p>
                </div>
              </div>
            </div>
          </div>
          
          <input type="hidden" name="metode_pembayaran" id="selected_payment_method" required>
        </div>

        <!-- Submit Button -->
        <div class="text-center pt-8">
          <button type="submit" name="submit" 
                  class="group bg-gradient-to-r from-pink-500 to-purple-600 text-white px-16 py-6 rounded-2xl font-bold text-xl hover:from-pink-600 hover:to-purple-700 transition-all duration-300 shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 hover:scale-105">
            <i class="fas fa-paper-plane mr-3 text-2xl group-hover:scale-110 transition-transform"></i>
            Buat Undangan Digital
            <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
          </button>
          
          <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl border border-blue-200">
            <p class="text-gray-600 font-medium">
              <i class="fas fa-info-circle mr-2 text-blue-500"></i>
              Setelah mengisi form, Anda akan mendapat konfirmasi dan instruksi pembayaran
            </p>
          </div>
        </div>
        
    </form>
    </div>
  </div>

  <!-- Back to Home -->
  <div class="text-center mt-12 relative z-10">
    <a href="index.php" class="group inline-flex items-center px-8 py-4 bg-white text-purple-600 font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 border border-purple-200">
      <i class="fas fa-arrow-left mr-3 text-xl group-hover:-translate-x-1 transition-transform"></i>
      Kembali ke Halaman Utama
    </a>
  </div>

  <script>
    function updatePrice() {
      const template = document.querySelector('select[name="template"]').value;
      const paket = document.querySelector('select[name="paket"]').value;
      const priceDisplay = document.getElementById('price-display');
      
      if (!template || !paket) {
        priceDisplay.textContent = '';
        return;
      }
      
      let price = 0;
      switch(template) {
        case 'classic':
          switch(paket) {
            case 'basic': price = 50000; break;
            case 'premium': price = 100000; break;
            case 'exclusive': price = 200000; break;
          }
          break;
        case 'modern':
          switch(paket) {
            case 'basic': price = 75000; break;
            case 'premium': price = 125000; break;
            case 'exclusive': price = 250000; break;
          }
          break;
        case 'luxury':
          switch(paket) {
            case 'basic': price = 100000; break;
            case 'premium': price = 150000; break;
            case 'exclusive': price = 300000; break;
          }
          break;
      }
      
      if (price > 0) {
        priceDisplay.innerHTML = `
          <div class="text-center">
            <div class="text-3xl font-bold text-purple-600 mb-2">Rp ${price.toLocaleString('id-ID')}</div>
            <div class="text-sm text-gray-600">Harga final untuk ${template.charAt(0).toUpperCase() + template.slice(1)} ${paket.charAt(0).toUpperCase() + paket.slice(1)}</div>
          </div>
        `;
      } else {
        priceDisplay.innerHTML = `
          <span class="text-2xl font-bold text-purple-600">Pilih template dan paket untuk melihat harga</span>
        `;
      }
    }
    
    // Update price when template changes
    document.querySelector('select[name="template"]').addEventListener('change', updatePrice);
    
    // Payment method selection
    function selectPaymentMethod(method) {
      // Remove selected class from all cards
      document.querySelectorAll('.payment-method-card').forEach(card => {
        card.classList.remove('selected');
      });
      
      // Add selected class to clicked card
      event.currentTarget.classList.add('selected');
      
      // Set hidden input value
      document.getElementById('selected_payment_method').value = method;
    }
  </script>

</body>
</html>
