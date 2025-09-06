<?php
include 'db.php';

// Handle RSVP submission
if ($_POST && isset($_POST['submit_rsvp'])) {
    $undangan_id = $_POST['undangan_id'];
    $nama_tamu = $_POST['nama_tamu'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $status_rsvp = $_POST['status_rsvp'];
    $jumlah_hadir = $_POST['jumlah_hadir'];
    $ucapan = $_POST['ucapan'];
    
    // Insert RSVP data
    $sql = "INSERT INTO tamu (undangan_id, nama_tamu, email, no_hp, status_rsvp, jumlah_hadir, ucapan) 
            VALUES ('$undangan_id', '$nama_tamu', '$email', '$no_hp', '$status_rsvp', '$jumlah_hadir', '$ucapan')";
    
    if (mysqli_query($conn, $sql)) {
        $rsvp_success = "Terima kasih! Konfirmasi kehadiran Anda telah tercatat.";
    } else {
        $rsvp_error = "Error: " . mysqli_error($conn);
    }
}

// Get invitation data
$slug = $_GET['slug'];
$sql = "SELECT * FROM undangan WHERE slug='$slug'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die('Undangan tidak ditemukan!');
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
    SUM(CASE WHEN status_rsvp = 'pending' THEN 1 ELSE 0 END) as pending
    FROM tamu WHERE undangan_id = {$data['id']}";
$rsvp_stats = mysqli_query($conn, $rsvp_stats_sql);
$stats = mysqli_fetch_assoc($rsvp_stats);

// Format tanggal
$tanggal_formatted = date('d F Y', strtotime($data['tanggal_acara']));
$waktu_formatted = date('H:i', strtotime($data['waktu_acara']));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RSVP - <?= $data['nama_pasangan'] ?></title>
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
<body class="bg-gradient-to-br from-purple-50 to-pink-50 font-body min-h-screen py-8">
  
  <div class="max-w-4xl mx-auto px-4">
    <!-- Header -->
    <div class="text-center mb-8">
      <h1 class="text-4xl font-heading font-bold text-purple-600 mb-2">Konfirmasi Kehadiran</h1>
      <p class="text-gray-600">Undangan Pernikahan <?= $data['nama_pasangan'] ?></p>
    </div>

    <!-- RSVP Statistics -->
    <div class="bg-white rounded-2xl shadow-xl p-6 mb-8">
      <h2 class="text-2xl font-heading font-bold text-gray-800 mb-6 text-center">Statistik Kehadiran</h2>
      <div class="grid md:grid-cols-4 gap-4">
        <div class="text-center p-4 bg-blue-50 rounded-lg">
          <div class="text-2xl font-bold text-blue-600"><?= $stats['total'] ?></div>
          <div class="text-sm text-gray-600">Total RSVP</div>
        </div>
        <div class="text-center p-4 bg-green-50 rounded-lg">
          <div class="text-2xl font-bold text-green-600"><?= $stats['coming'] ?></div>
          <div class="text-sm text-gray-600">Akan Hadir</div>
        </div>
        <div class="text-center p-4 bg-red-50 rounded-lg">
          <div class="text-2xl font-bold text-red-600"><?= $stats['not_coming'] ?></div>
          <div class="text-sm text-gray-600">Tidak Hadir</div>
        </div>
        <div class="text-center p-4 bg-yellow-50 rounded-lg">
          <div class="text-2xl font-bold text-yellow-600"><?= $stats['pending'] ?></div>
          <div class="text-sm text-gray-600">Belum Konfirmasi</div>
        </div>
      </div>
    </div>

    <!-- RSVP Form -->
    <div class="bg-white rounded-2xl shadow-xl p-8">
      <h2 class="text-2xl font-heading font-bold text-gray-800 mb-6">Form Konfirmasi Kehadiran</h2>
      
      <?php if (isset($rsvp_success)): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
          <i class="fas fa-check-circle mr-2"></i><?= $rsvp_success ?>
        </div>
      <?php endif; ?>

      <?php if (isset($rsvp_error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
          <i class="fas fa-exclamation-circle mr-2"></i><?= $rsvp_error ?>
        </div>
      <?php endif; ?>

      <form method="POST" class="space-y-6">
        <input type="hidden" name="undangan_id" value="<?= $data['id'] ?>">
        
        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
            <input type="text" name="nama_tamu" required 
                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                   placeholder="Masukkan nama lengkap Anda">
          </div>
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
            <input type="email" name="email" 
                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                   placeholder="email@example.com">
          </div>
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor HP</label>
            <input type="tel" name="no_hp" 
                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                   placeholder="081234567890">
          </div>
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Status Kehadiran *</label>
            <select name="status_rsvp" required 
                    class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
              <option value="">Pilih Status</option>
              <option value="coming">Akan Hadir</option>
              <option value="not_coming">Tidak Hadir</option>
            </select>
          </div>
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Orang</label>
            <input type="number" name="jumlah_hadir" min="1" max="10" value="1"
                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Ucapan & Doa (Opsional)</label>
          <textarea name="ucapan" rows="4" 
                    class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    placeholder="Tuliskan ucapan dan doa untuk mempelai..."></textarea>
        </div>
        
        <div class="text-center">
          <button type="submit" name="submit_rsvp" 
                  class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:from-pink-600 hover:to-purple-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            <i class="fas fa-paper-plane mr-2"></i>
            Konfirmasi Kehadiran
          </button>
        </div>
      </form>
    </div>

    <!-- Back to Invitation -->
    <div class="text-center mt-8">
      <a href="invitation.php?slug=<?= $data['slug'] ?>" class="text-purple-600 hover:text-purple-800 font-medium">
        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Undangan
      </a>
    </div>
  </div>

</body>
</html>
