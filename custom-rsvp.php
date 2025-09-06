<?php
include 'db.php';

// Check access
$slug = $_GET['slug'];
$access_token = $_GET['token'];

$sql = "SELECT * FROM undangan WHERE slug='$slug' AND access_token='$access_token'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die('Akses tidak diizinkan atau undangan tidak ditemukan!');
}

// Check if custom RSVP addon is active
$addon_sql = "SELECT a.* FROM addon a 
              JOIN undangan_addon ua ON a.id = ua.addon_id 
              WHERE ua.undangan_id = {$data['id']} AND a.slug = 'custom_rsvp' AND ua.status = 'active'";
$addon_result = mysqli_query($conn, $addon_sql);

if (mysqli_num_rows($addon_result) == 0) {
    die('Fitur Custom RSVP belum diaktifkan untuk undangan ini!');
}

// Handle custom RSVP configuration
if ($_POST) {
    if (isset($_POST['save_config'])) {
        $custom_fields = $_POST['custom_fields'] ?? [];
        $rsvp_options = $_POST['rsvp_options'] ?? [];
        $acara_options = $_POST['acara_options'] ?? [];
        
        // Save configuration to database (simplified - in real implementation, you'd use JSON)
        $config_data = json_encode([
            'custom_fields' => $custom_fields,
            'rsvp_options' => $rsvp_options,
            'acara_options' => $acara_options
        ]);
        
        // Update undangan table with custom RSVP config
        $update_sql = "UPDATE undangan SET ucapan_khusus = '$config_data' WHERE id = {$data['id']}";
        mysqli_query($conn, $update_sql);
        
        $success = "Konfigurasi Custom RSVP berhasil disimpan!";
    }
}

// Get current configuration
$current_config = json_decode($data['ucapan_khusus'], true) ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom RSVP - <?= $data['nama_pasangan'] ?></title>
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
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-100 font-body">
  
  <!-- Header -->
  <header class="bg-white shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-4">
        <div class="flex items-center">
          <h1 class="text-2xl font-heading font-bold text-purple-600">Custom RSVP</h1>
        </div>
        <div class="flex items-center space-x-4">
          <a href="client-dashboard.php?slug=<?= $data['slug'] ?>&token=<?= $data['access_token'] ?>" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-medium transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
          </a>
        </div>
      </div>
    </div>
  </header>

  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <?php if (isset($success)): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
        <i class="fas fa-check-circle mr-2"></i><?= $success ?>
      </div>
    <?php endif; ?>

    <!-- Event Info -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
      <h2 class="text-2xl font-heading font-bold text-gray-800 mb-4">Informasi Acara</h2>
      <div class="grid md:grid-cols-2 gap-6">
        <div>
          <h3 class="text-xl font-semibold text-gray-700 mb-2"><?= $data['nama_pasangan'] ?></h3>
          <p class="text-gray-600 mb-1"><strong>Tanggal:</strong> <?= date('d F Y', strtotime($data['tanggal_acara'])) ?></p>
          <p class="text-gray-600 mb-1"><strong>Waktu:</strong> <?= date('H:i', strtotime($data['waktu_acara'])) ?> WIB</p>
          <p class="text-gray-600"><strong>Lokasi:</strong> <?= $data['lokasi'] ?></p>
        </div>
        <div>
          <p class="text-gray-600 mb-1"><strong>Template:</strong> <?= ucfirst($data['template']) ?></p>
          <p class="text-gray-600 mb-1"><strong>Paket:</strong> <?= ucfirst($data['paket']) ?></p>
          <p class="text-gray-600"><strong>Status:</strong> 
            <span class="px-2 py-1 text-xs font-semibold rounded-full <?= $data['status'] == 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
              <?= ucfirst($data['status']) ?>
            </span>
          </p>
        </div>
      </div>
    </div>

    <!-- Custom RSVP Configuration -->
    <div class="bg-white rounded-xl shadow-md p-8">
      <h2 class="text-2xl font-heading font-bold text-gray-800 mb-6">Konfigurasi Custom RSVP</h2>
      <p class="text-gray-600 mb-8">Sesuaikan form RSVP sesuai kebutuhan acara Anda dengan menambahkan field tambahan dan opsi khusus.</p>
      
      <form method="POST" class="space-y-8">
        
        <!-- Custom Fields Section -->
        <div class="border border-gray-200 rounded-xl p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Field Tambahan</h3>
          <p class="text-gray-600 mb-4">Tambahkan field khusus untuk mengumpulkan informasi tambahan dari tamu</p>
          
          <div id="custom-fields">
            <div class="space-y-4">
              <div class="flex items-center space-x-4">
                <input type="checkbox" name="custom_fields[]" value="kendaraan" 
                       <?= in_array('kendaraan', $current_config['custom_fields'] ?? []) ? 'checked' : '' ?>
                       class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                <label class="text-gray-700">Jenis Kendaraan (untuk pengelolaan parkir)</label>
              </div>
              
              <div class="flex items-center space-x-4">
                <input type="checkbox" name="custom_fields[]" value="dietary" 
                       <?= in_array('dietary', $current_config['custom_fields'] ?? []) ? 'checked' : '' ?>
                       class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                <label class="text-gray-700">Kebutuhan Diet Khusus</label>
              </div>
              
              <div class="flex items-center space-x-4">
                <input type="checkbox" name="custom_fields[]" value="accommodation" 
                       <?= in_array('accommodation', $current_config['custom_fields'] ?? []) ? 'checked' : '' ?>
                       class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                <label class="text-gray-700">Butuh Akomodasi</label>
              </div>
              
              <div class="flex items-center space-x-4">
                <input type="checkbox" name="custom_fields[]" value="transport" 
                       <?= in_array('transport', $current_config['custom_fields'] ?? []) ? 'checked' : '' ?>
                       class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                <label class="text-gray-700">Butuh Transportasi</label>
              </div>
              
              <div class="flex items-center space-x-4">
                <input type="checkbox" name="custom_fields[]" value="gift_preference" 
                       <?= in_array('gift_preference', $current_config['custom_fields'] ?? []) ? 'checked' : '' ?>
                       class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                <label class="text-gray-700">Preferensi Hadiah</label>
              </div>
            </div>
          </div>
        </div>

        <!-- RSVP Options Section -->
        <div class="border border-gray-200 rounded-xl p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Opsi RSVP</h3>
          <p class="text-gray-600 mb-4">Sesuaikan opsi konfirmasi kehadiran</p>
          
          <div class="space-y-4">
            <div class="flex items-center space-x-4">
              <input type="checkbox" name="rsvp_options[]" value="maybe" 
                     <?= in_array('maybe', $current_config['rsvp_options'] ?? []) ? 'checked' : '' ?>
                     class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
              <label class="text-gray-700">Tambahkan opsi "Mungkin Hadir"</label>
            </div>
            
            <div class="flex items-center space-x-4">
              <input type="checkbox" name="rsvp_options[]" value="late" 
                     <?= in_array('late', $current_config['rsvp_options'] ?? []) ? 'checked' : '' ?>
                     class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
              <label class="text-gray-700">Tambahkan opsi "Terlambat"</label>
            </div>
            
            <div class="flex items-center space-x-4">
              <input type="checkbox" name="rsvp_options[]" value="early_leave" 
                     <?= in_array('early_leave', $current_config['rsvp_options'] ?? []) ? 'checked' : '' ?>
                     class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
              <label class="text-gray-700">Tambahkan opsi "Pulang Lebih Awal"</label>
            </div>
          </div>
        </div>

        <!-- Event Options Section -->
        <div class="border border-gray-200 rounded-xl p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Opsi Acara</h3>
          <p class="text-gray-600 mb-4">Jika acara memiliki beberapa sesi, tamu dapat memilih sesi yang akan dihadiri</p>
          
          <div class="space-y-4">
            <div class="flex items-center space-x-4">
              <input type="checkbox" name="acara_options[]" value="akad_only" 
                     <?= in_array('akad_only', $current_config['acara_options'] ?? []) ? 'checked' : '' ?>
                     class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
              <label class="text-gray-700">Akad Nikah Saja</label>
            </div>
            
            <div class="flex items-center space-x-4">
              <input type="checkbox" name="acara_options[]" value="resepsi_only" 
                     <?= in_array('resepsi_only', $current_config['acara_options'] ?? []) ? 'checked' : '' ?>
                     class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
              <label class="text-gray-700">Resepsi Saja</label>
            </div>
            
            <div class="flex items-center space-x-4">
              <input type="checkbox" name="acara_options[]" value="both" 
                     <?= in_array('both', $current_config['acara_options'] ?? []) ? 'checked' : '' ?>
                     class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
              <label class="text-gray-700">Akad & Resepsi</label>
            </div>
          </div>
        </div>

        <!-- Preview Section -->
        <div class="border border-gray-200 rounded-xl p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Preview Form RSVP</h3>
          <p class="text-gray-600 mb-4">Lihat bagaimana form RSVP akan terlihat dengan konfigurasi saat ini</p>
          
          <div class="bg-gray-50 p-6 rounded-lg">
            <h4 class="font-semibold text-gray-800 mb-4">Form RSVP Custom</h4>
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                <input type="text" disabled class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100" placeholder="Masukkan nama lengkap">
              </div>
              
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status Kehadiran *</label>
                <select disabled class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100">
                  <option>Akan Hadir</option>
                  <option>Tidak Hadir</option>
                  <option>Mungkin Hadir</option>
                  <option>Terlambat</option>
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Orang</label>
                <input type="number" disabled class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100" placeholder="1">
              </div>
              
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kendaraan</label>
                <select disabled class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100">
                  <option>Mobil</option>
                  <option>Motor</option>
                  <option>Bus</option>
                  <option>Tidak Membawa Kendaraan</option>
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Sesi Acara</label>
                <select disabled class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100">
                  <option>Akad & Resepsi</option>
                  <option>Akad Saja</option>
                  <option>Resepsi Saja</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <!-- Save Button -->
        <div class="text-center">
          <button type="submit" name="save_config" 
                  class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-8 py-4 rounded-full font-semibold text-lg hover:from-pink-600 hover:to-purple-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            <i class="fas fa-save mr-2"></i>Simpan Konfigurasi
          </button>
        </div>
      </form>
    </div>

    <!-- Test RSVP Link -->
    <div class="mt-8 bg-white rounded-xl shadow-md p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Test Custom RSVP</h3>
      <p class="text-gray-600 mb-4">Test form RSVP custom dengan mengklik link berikut:</p>
      <a href="rsvp.php?slug=<?= $data['slug'] ?>" target="_blank" 
         class="bg-gradient-to-r from-green-500 to-teal-600 text-white px-6 py-3 rounded-lg font-semibold transition shadow-lg hover:shadow-xl">
        <i class="fas fa-external-link-alt mr-2"></i>Test Custom RSVP
      </a>
    </div>
  </div>

</body>
</html>
