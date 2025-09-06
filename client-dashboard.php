<?php
include 'db.php';

// Check if invitation exists and get access token
$slug = $_GET['slug'];
$access_token = $_GET['token'];

$sql = "SELECT * FROM undangan WHERE slug='$slug' AND access_token='$access_token'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die('Akses tidak diizinkan atau undangan tidak ditemukan!');
}

// Check if invitation is still active (1 year from event date)
$event_date = strtotime($data['tanggal_acara']);
$expiry_date = strtotime('+1 year', $event_date);
$current_date = time();

if ($current_date > $expiry_date) {
    die('Undangan ini sudah tidak aktif. Masa aktif undangan adalah 1 tahun dari tanggal acara.');
}

// Get RSVP statistics
$rsvp_stats_sql = "SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN status_rsvp = 'coming' THEN 1 ELSE 0 END) as coming,
    SUM(CASE WHEN status_rsvp = 'not_coming' THEN 1 ELSE 0 END) as not_coming,
    SUM(CASE WHEN status_rsvp = 'pending' THEN 1 ELSE 0 END) as pending,
    SUM(CASE WHEN status_rsvp = 'coming' THEN jumlah_hadir ELSE 0 END) as total_guests
    FROM tamu WHERE undangan_id = {$data['id']}";
$rsvp_stats = mysqli_query($conn, $rsvp_stats_sql);
$stats = mysqli_fetch_assoc($rsvp_stats);

// Get guest list
$guests_sql = "SELECT * FROM tamu WHERE undangan_id = {$data['id']} ORDER BY created_at DESC";
$guests = mysqli_query($conn, $guests_sql);

// Get invitation views (simulated - in real implementation, you'd track this)
$total_views = $stats['total'] + rand(10, 50); // Simulated views

// Format dates
$tanggal_formatted = date('d F Y', strtotime($data['tanggal_acara']));
$waktu_formatted = date('H:i', strtotime($data['waktu_acara']));
$created_formatted = date('d F Y', strtotime($data['created_at']));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - <?= $data['nama_pasangan'] ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            heading: ['Playfair Display', 'serif'],
            body: ['Poppins', 'sans-serif'],
          },
          animation: {
            'fade-in': 'fadeIn 0.8s ease-out forwards',
            'slide-up': 'slideUp 0.6s ease-out forwards',
            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            'bounce-slow': 'bounce 2s infinite',
            'float': 'float 3s ease-in-out infinite',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(20px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
            slideUp: {
              '0%': { transform: 'translateY(30px)', opacity: '0' },
              '100%': { transform: 'translateY(0)', opacity: '1' },
            },
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-10px)' },
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
    
    .glassmorphism {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
    }
    
    html, body {
      overflow-x: hidden;
      overflow-y: auto;
    }

    .card-hover {
      transition: all 0.3s ease;
    }
    
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .btn-hover {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .btn-hover:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    
    .btn-hover::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }
    
    .btn-hover:hover::before {
      left: 100%;
    }
    
    .stat-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
    }
    
    .stat-card-alt {
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      color: white;
    }
    
    .stat-card-success {
      background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      color: white;
    }
    
    .stat-card-warning {
      background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
      color: white;
    }
    
    .animated-bg {
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
    }
    
    @keyframes gradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
  </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 font-body relative">
  
  <!-- Background decoration -->
  <div class="absolute inset-0 opacity-5">
    <div class="absolute top-20 left-20 w-40 h-40 bg-purple-500 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-20 w-60 h-60 bg-pink-500 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full blur-3xl"></div>
  </div>
  
  <!-- Header -->
  <header class="bg-white/80 backdrop-blur-sm shadow-lg border-b border-gray-200 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
      <div class="flex justify-between items-center py-6">
        <div class="flex items-center">
          <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
            <i class="fas fa-heart text-white text-lg"></i>
          </div>
          <div>
            <h1 class="text-3xl font-heading font-bold gradient-text">Dashboard Undangan</h1>
            <p class="text-sm text-gray-600">Kelola undangan pernikahan Anda</p>
          </div>
        </div>
        <div class="flex items-center space-x-6">
          <div class="text-right">
            <p class="text-sm text-gray-500">Last Updated</p>
            <p class="text-sm font-semibold text-gray-800"><?= date('d M Y, H:i') ?></p>
          </div>
          <a href="invitation.php?slug=<?= $data['slug'] ?>" target="_blank" class="btn-hover bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-lg">
            <i class="fas fa-eye mr-2"></i>Lihat Undangan
          </a>
        </div>
      </div>
    </div>
  </header>

  <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 py-10 relative z-10">
    
    <!-- Event Info -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8 mb-10 card-hover animate-fade-in">
      <div class="flex items-center mb-6">
        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
          <i class="fas fa-heart text-white text-2xl"></i>
        </div>
        <div>
          <h2 class="text-3xl font-heading font-bold gradient-text">Informasi Acara</h2>
          <p class="text-gray-600">Detail lengkap undangan pernikahan Anda</p>
        </div>
      </div>
      <div class="grid md:grid-cols-2 gap-8">
        <div class="space-y-4">
          <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6">
            <h3 class="text-2xl font-heading font-bold text-gray-800 mb-4"><?= $data['nama_pasangan'] ?></h3>
            <div class="space-y-3">
              <div class="flex items-center">
                <i class="fas fa-calendar-alt text-purple-500 w-5 mr-3"></i>
                <span class="text-gray-700 font-medium"><?= $tanggal_formatted ?></span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-clock text-purple-500 w-5 mr-3"></i>
                <span class="text-gray-700 font-medium"><?= $waktu_formatted ?> WIB</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-map-marker-alt text-purple-500 w-5 mr-3"></i>
                <span class="text-gray-700 font-medium"><?= $data['lokasi'] ?></span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-palette text-purple-500 w-5 mr-3"></i>
                <span class="text-gray-700 font-medium">Template <?= ucfirst($data['template']) ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="space-y-4">
          <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6">
            <h4 class="text-lg font-semibold text-gray-800 mb-4">Detail Order</h4>
            <div class="space-y-3">
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Paket:</span>
                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold"><?= ucfirst($data['paket']) ?></span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Harga:</span>
                <span class="font-bold text-gray-800">Rp <?= number_format($data['harga'], 0, ',', '.') ?></span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Status:</span>
                <span class="px-3 py-1 text-xs font-semibold rounded-full <?= $data['status'] == 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
                  <?= ucfirst($data['status']) ?>
                </span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Dibuat:</span>
                <span class="text-gray-800 font-medium"><?= $created_formatted ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
      <div class="stat-card rounded-2xl shadow-xl p-6 card-hover animate-slide-up">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-white/80 mb-1">Total Views</p>
            <p class="text-3xl font-bold text-white"><?= $total_views ?></p>
            <p class="text-xs text-white/70 mt-1">Undangan dilihat</p>
          </div>
          <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
            <i class="fas fa-eye text-white text-2xl"></i>
          </div>
        </div>
      </div>

      <div class="stat-card-success rounded-2xl shadow-xl p-6 card-hover animate-slide-up" style="animation-delay: 0.1s;">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-white/80 mb-1">Akan Hadir</p>
            <p class="text-3xl font-bold text-white"><?= $stats['coming'] ?></p>
            <p class="text-xs text-white/70 mt-1">Konfirmasi hadir</p>
          </div>
          <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
            <i class="fas fa-check-circle text-white text-2xl"></i>
          </div>
        </div>
      </div>

      <div class="stat-card-alt rounded-2xl shadow-xl p-6 card-hover animate-slide-up" style="animation-delay: 0.2s;">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-white/80 mb-1">Tidak Hadir</p>
            <p class="text-3xl font-bold text-white"><?= $stats['not_coming'] ?></p>
            <p class="text-xs text-white/70 mt-1">Tidak bisa hadir</p>
          </div>
          <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
            <i class="fas fa-times-circle text-white text-2xl"></i>
          </div>
        </div>
      </div>

      <div class="stat-card-warning rounded-2xl shadow-xl p-6 card-hover animate-slide-up" style="animation-delay: 0.3s;">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-white/80 mb-1">Total Tamu</p>
            <p class="text-3xl font-bold text-white"><?= $stats['total_guests'] ?></p>
            <p class="text-xs text-white/70 mt-1">Jumlah tamu</p>
          </div>
          <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
            <i class="fas fa-users text-white text-2xl"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- RSVP Statistics -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8 mb-10 card-hover animate-fade-in">
      <div class="flex items-center mb-6">
        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-4">
          <i class="fas fa-chart-pie text-white text-lg"></i>
        </div>
        <div>
          <h3 class="text-2xl font-heading font-bold gradient-text">Statistik RSVP</h3>
          <p class="text-gray-600">Ringkasan konfirmasi kehadiran tamu</p>
        </div>
      </div>
      <div class="grid md:grid-cols-4 gap-6">
        <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200">
          <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-list text-white text-xl"></i>
          </div>
          <div class="text-3xl font-bold text-blue-600 mb-2"><?= $stats['total'] ?></div>
          <div class="text-sm font-medium text-gray-700">Total RSVP</div>
        </div>
        <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-xl border border-green-200">
          <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-check text-white text-xl"></i>
          </div>
          <div class="text-3xl font-bold text-green-600 mb-2"><?= $stats['coming'] ?></div>
          <div class="text-sm font-medium text-gray-700">Akan Hadir</div>
        </div>
        <div class="text-center p-6 bg-gradient-to-br from-red-50 to-red-100 rounded-xl border border-red-200">
          <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-times text-white text-xl"></i>
          </div>
          <div class="text-3xl font-bold text-red-600 mb-2"><?= $stats['not_coming'] ?></div>
          <div class="text-sm font-medium text-gray-700">Tidak Hadir</div>
        </div>
        <div class="text-center p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl border border-yellow-200">
          <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-clock text-white text-xl"></i>
          </div>
          <div class="text-3xl font-bold text-yellow-600 mb-2"><?= $stats['pending'] ?></div>
          <div class="text-sm font-medium text-gray-700">Belum Konfirmasi</div>
        </div>
      </div>
    </div>

    <!-- Guest List -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-10 card-hover animate-fade-in">
      <div class="px-8 py-6 bg-gradient-to-r from-purple-50 to-pink-50 border-b border-gray-200">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-users text-white text-lg"></i>
            </div>
            <div>
              <h3 class="text-2xl font-heading font-bold gradient-text">Daftar Tamu</h3>
              <p class="text-gray-600">Daftar lengkap tamu yang telah RSVP</p>
            </div>
          </div>
        </div>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
              <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kontak</th>
              <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
              <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah</th>
              <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal RSVP</th>
              <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ucapan</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-100">
            <?php while ($guest = mysqli_fetch_assoc($guests)): ?>
            <tr class="hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-300">
              <td class="px-8 py-6 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-user text-white text-sm"></i>
                  </div>
                  <div class="text-sm font-semibold text-gray-900"><?= $guest['nama_tamu'] ?></div>
                </div>
              </td>
              <td class="px-8 py-6 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-medium"><?= $guest['email'] ?></div>
                <div class="text-sm text-gray-500"><?= $guest['no_hp'] ?></div>
              </td>
              <td class="px-8 py-6 whitespace-nowrap">
                <?php
                $status_color = '';
                $status_text = '';
                switch($guest['status_rsvp']) {
                    case 'coming': $status_color = 'bg-green-100 text-green-800'; $status_text = 'Akan Hadir'; break;
                    case 'not_coming': $status_color = 'bg-red-100 text-red-800'; $status_text = 'Tidak Hadir'; break;
                    case 'pending': $status_color = 'bg-yellow-100 text-yellow-800'; $status_text = 'Belum Konfirmasi'; break;
                }
                ?>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold <?= $status_color ?>">
                  <i class="fas fa-circle text-xs mr-1"></i>
                  <?= $status_text ?>
                </span>
              </td>
              <td class="px-8 py-6 whitespace-nowrap">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                  <i class="fas fa-users mr-1"></i>
                  <?= $guest['jumlah_hadir'] ?> orang
                </span>
              </td>
              <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-500">
                <?= date('d M Y', strtotime($guest['created_at'])) ?>
              </td>
              <td class="px-8 py-6">
                <div class="text-sm text-gray-900 max-w-xs truncate">
                  <?= $guest['ucapan'] ? $guest['ucapan'] : '-' ?>
                </div>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Management Links -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8 mb-10 card-hover animate-fade-in">
      <div class="flex items-center mb-8">
        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center mr-4">
          <i class="fas fa-cogs text-white text-lg"></i>
        </div>
        <div>
          <h3 class="text-2xl font-heading font-bold gradient-text">Kelola Undangan</h3>
          <p class="text-gray-600">Fitur manajemen untuk undangan Anda</p>
        </div>
      </div>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="manage-guests.php?slug=<?= $data['slug'] ?>&token=<?= $data['access_token'] ?>" class="btn-hover bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center group">
          <i class="fas fa-users mr-3 text-lg"></i>
          <div class="text-left">
            <div class="font-bold">Kelola Tamu</div>
            <div class="text-xs opacity-80">Tambah & edit daftar tamu</div>
          </div>
        </a>
        <a href="addon.php?id=<?= $data['id'] ?>" class="btn-hover bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center group">
          <i class="fas fa-plus mr-3 text-lg"></i>
          <div class="text-left">
            <div class="font-bold">Add-on</div>
            <div class="text-xs opacity-80">Fitur tambahan</div>
          </div>
        </a>
        <a href="custom-rsvp.php?slug=<?= $data['slug'] ?>&token=<?= $data['access_token'] ?>" class="btn-hover bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center group">
          <i class="fas fa-edit mr-3 text-lg"></i>
          <div class="text-left">
            <div class="font-bold">Custom RSVP</div>
            <div class="text-xs opacity-80">Kustomisasi form RSVP</div>
          </div>
        </a>
        <a href="digital-guestbook.php?slug=<?= $data['slug'] ?>&token=<?= $data['access_token'] ?>" class="btn-hover bg-gradient-to-r from-indigo-500 to-purple-500 text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center group">
          <i class="fas fa-qrcode mr-3 text-lg"></i>
          <div class="text-left">
            <div class="font-bold">Guestbook</div>
            <div class="text-xs opacity-80">Digital guestbook & QR</div>
          </div>
        </a>
        <a href="invitation.php?slug=<?= $data['slug'] ?>" target="_blank" class="btn-hover bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center group">
          <i class="fas fa-eye mr-3 text-lg"></i>
          <div class="text-left">
            <div class="font-bold">Preview</div>
            <div class="text-xs opacity-80">Lihat undangan</div>
          </div>
        </a>
      </div>
    </div>

    <!-- Share Links -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8 card-hover animate-fade-in">
      <div class="flex items-center mb-8">
        <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center mr-4">
          <i class="fas fa-share-alt text-white text-lg"></i>
        </div>
        <div>
          <h3 class="text-2xl font-heading font-bold gradient-text">Bagikan Undangan</h3>
          <p class="text-gray-600">Link untuk berbagi undangan dengan tamu</p>
        </div>
      </div>
      <div class="grid md:grid-cols-2 gap-6">
        <a href="invitation.php?slug=<?= $data['slug'] ?>" target="_blank" class="btn-hover bg-gradient-to-r from-purple-500 to-pink-500 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center group">
          <i class="fas fa-link mr-3 text-lg"></i>
          <div class="text-left">
            <div class="font-bold text-lg">Link Undangan</div>
            <div class="text-sm opacity-80">Bagikan undangan utama</div>
          </div>
        </a>
        <a href="rsvp.php?slug=<?= $data['slug'] ?>" target="_blank" class="btn-hover bg-gradient-to-r from-green-500 to-blue-500 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center group">
          <i class="fas fa-calendar-check mr-3 text-lg"></i>
          <div class="text-left">
            <div class="font-bold text-lg">Link RSVP</div>
            <div class="text-sm opacity-80">Form konfirmasi kehadiran</div>
          </div>
        </a>
      </div>
    </div>
  </div>

</body>
</html>
