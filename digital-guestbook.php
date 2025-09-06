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

// Check if digital guestbook addon is active
$addon_sql = "SELECT a.* FROM addon a 
              JOIN undangan_addon ua ON a.id = ua.addon_id 
              WHERE ua.undangan_id = {$data['id']} AND a.slug = 'digital_guestbook' AND ua.status = 'active'";
$addon_result = mysqli_query($conn, $addon_sql);

if (mysqli_num_rows($addon_result) == 0) {
    die('Fitur Digital Guestbook belum diaktifkan untuk undangan ini!');
}

// Handle QR code check-in
if ($_POST && isset($_POST['check_in'])) {
    $guest_id = $_POST['guest_id'];
    $jam_kehadiran = date('H:i:s');
    
    $update_sql = "UPDATE tamu SET jam_kehadiran = '$jam_kehadiran' WHERE id = $guest_id AND undangan_id = {$data['id']}";
    mysqli_query($conn, $update_sql);
    
    $success = "Check-in berhasil! Terima kasih telah hadir.";
}

// Generate QR codes for guests who don't have them
$guests_sql = "SELECT * FROM tamu WHERE undangan_id = {$data['id']} AND qr_code IS NULL";
$guests_result = mysqli_query($conn, $guests_sql);

while ($guest = mysqli_fetch_assoc($guests_result)) {
    $qr_data = $data['slug'] . '_' . $guest['id'] . '_' . time();
    $qr_code = hash('sha256', $qr_data);
    
    $update_qr_sql = "UPDATE tamu SET qr_code = '$qr_code' WHERE id = {$guest['id']}";
    mysqli_query($conn, $update_qr_sql);
}

// Get all guests with QR codes
$all_guests_sql = "SELECT * FROM tamu WHERE undangan_id = {$data['id']} ORDER BY nama_tamu";
$all_guests = mysqli_query($conn, $all_guests_sql);

// Get check-in statistics
$stats_sql = "SELECT 
    COUNT(*) as total_guests,
    SUM(CASE WHEN jam_kehadiran IS NOT NULL THEN 1 ELSE 0 END) as checked_in,
    SUM(CASE WHEN jam_kehadiran IS NULL THEN 1 ELSE 0 END) as not_checked_in
    FROM tamu WHERE undangan_id = {$data['id']}";
$stats_result = mysqli_query($conn, $stats_sql);
$stats = mysqli_fetch_assoc($stats_result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Guestbook - <?= $data['nama_pasangan'] ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
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
          <h1 class="text-2xl font-heading font-bold text-purple-600">Digital Guestbook</h1>
        </div>
        <div class="flex items-center space-x-4">
          <a href="client-dashboard.php?slug=<?= $data['slug'] ?>&token=<?= $data['access_token'] ?>" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-medium transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
          </a>
        </div>
      </div>
    </div>
  </header>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
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
          <p class="text-gray-600 mb-1"><strong>Status:</strong> 
            <span class="px-2 py-1 text-xs font-semibold rounded-full <?= $data['status'] == 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
              <?= ucfirst($data['status']) ?>
            </span>
          </p>
        </div>
      </div>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex items-center">
          <div class="p-3 bg-blue-100 rounded-lg">
            <i class="fas fa-users text-blue-600 text-xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-600">Total Tamu</p>
            <p class="text-2xl font-bold text-gray-900"><?= $stats['total_guests'] ?></p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex items-center">
          <div class="p-3 bg-green-100 rounded-lg">
            <i class="fas fa-check-circle text-green-600 text-xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-600">Sudah Check-in</p>
            <p class="text-2xl font-bold text-gray-900"><?= $stats['checked_in'] ?></p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex items-center">
          <div class="p-3 bg-yellow-100 rounded-lg">
            <i class="fas fa-clock text-yellow-600 text-xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-600">Belum Check-in</p>
            <p class="text-2xl font-bold text-gray-900"><?= $stats['not_checked_in'] ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- QR Code Scanner -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Scanner QR Code</h3>
      <div class="text-center">
        <div id="qr-reader" class="mx-auto mb-4"></div>
        <p class="text-gray-600">Scan QR Code dari undangan tamu untuk check-in otomatis</p>
      </div>
    </div>

    <!-- Manual Check-in -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Check-in Manual</h3>
      <form method="POST" class="space-y-4">
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Tamu</label>
            <select name="guest_id" required 
                    class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
              <option value="">Pilih tamu yang hadir</option>
              <?php while ($guest = mysqli_fetch_assoc($all_guests)): ?>
              <option value="<?= $guest['id'] ?>" <?= $guest['jam_kehadiran'] ? 'disabled' : '' ?>>
                <?= $guest['nama_tamu'] ?> <?= $guest['jam_kehadiran'] ? '(Sudah check-in)' : '' ?>
              </option>
              <?php endwhile; ?>
            </select>
          </div>
        </div>
        
        <div class="text-center">
          <button type="submit" name="check_in" 
                  class="bg-gradient-to-r from-green-500 to-teal-600 text-white px-8 py-3 rounded-full font-semibold hover:from-green-600 hover:to-teal-700 transition shadow-lg hover:shadow-xl">
            <i class="fas fa-check mr-2"></i>Check-in Tamu
          </button>
        </div>
      </form>
    </div>

    <!-- Guests List with QR Codes -->
    <div class="bg-white rounded-xl shadow-md">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Daftar Tamu & QR Code</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">QR Code</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Kehadiran</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php 
            mysqli_data_seek($all_guests, 0); // Reset pointer
            while ($guest = mysqli_fetch_assoc($all_guests)): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900"><?= $guest['nama_tamu'] ?></div>
                <div class="text-sm text-gray-500"><?= $guest['no_hp'] ?></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div id="qr-<?= $guest['id'] ?>" class="w-16 h-16"></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <?php if ($guest['jam_kehadiran']): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Sudah Hadir
                </span>
                <?php else: ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                  Belum Hadir
                </span>
                <?php endif; ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                <?= $guest['jam_kehadiran'] ? date('H:i', strtotime($guest['jam_kehadiran'])) : '-' ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-2">
                  <button onclick="printQR('<?= $guest['id'] ?>')" class="text-blue-600 hover:text-blue-900">
                    <i class="fas fa-print"></i>
                  </button>
                  <button onclick="downloadQR('<?= $guest['id'] ?>')" class="text-green-600 hover:text-green-900">
                    <i class="fas fa-download"></i>
                  </button>
                </div>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    // Generate QR codes for each guest
    <?php 
    mysqli_data_seek($all_guests, 0); // Reset pointer
    while ($guest = mysqli_fetch_assoc($all_guests)): ?>
    QRCode.toCanvas(document.getElementById('qr-<?= $guest['id'] ?>'), '<?= $guest['qr_code'] ?>', {
      width: 64,
      height: 64,
      color: {
        dark: '#000000',
        light: '#FFFFFF'
      }
    });
    <?php endwhile; ?>

    // QR Code Scanner
    function onScanSuccess(decodedText, decodedResult) {
      // Handle scanned QR code
      const qrData = decodedText.split('_');
      if (qrData.length >= 2) {
        const guestId = qrData[1];
        // Auto check-in
        const form = document.createElement('form');
        form.method = 'POST';
        form.innerHTML = '<input type="hidden" name="guest_id" value="' + guestId + '">';
        document.body.appendChild(form);
        form.submit();
      }
    }

    // Initialize QR scanner
    const html5QrcodeScanner = new Html5QrcodeScanner(
      "qr-reader", 
      { 
        fps: 10, 
        qrbox: { width: 250, height: 250 } 
      }
    );
    html5QrcodeScanner.render(onScanSuccess);

    function printQR(guestId) {
      const qrElement = document.getElementById('qr-' + guestId);
      const printWindow = window.open('', '_blank');
      printWindow.document.write('<html><body>' + qrElement.outerHTML + '</body></html>');
      printWindow.document.close();
      printWindow.print();
    }

    function downloadQR(guestId) {
      const canvas = document.getElementById('qr-' + guestId).querySelector('canvas');
      const link = document.createElement('a');
      link.download = 'qr-code-' + guestId + '.png';
      link.href = canvas.toDataURL();
      link.click();
    }
  </script>
  <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

</body>
</html>
