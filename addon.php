<?php
include 'db.php';

// Handle addon selection
if ($_POST && isset($_POST['select_addon'])) {
    $undangan_id = $_POST['undangan_id'];
    $selected_addons = $_POST['addons'] ?? [];
    
    // Calculate total addon price
    $total_addon_price = 0;
    foreach ($selected_addons as $addon_id) {
        $sql = "SELECT harga FROM addon WHERE id = $addon_id";
        $result = mysqli_query($conn, $sql);
        $addon = mysqli_fetch_assoc($result);
        $total_addon_price += $addon['harga'];
    }
    
    // Insert selected addons
    foreach ($selected_addons as $addon_id) {
        $sql = "SELECT harga FROM addon WHERE id = $addon_id";
        $result = mysqli_query($conn, $sql);
        $addon = mysqli_fetch_assoc($result);
        
        $insert_sql = "INSERT INTO undangan_addon (undangan_id, addon_id, harga_addon) VALUES ('$undangan_id', '$addon_id', '{$addon['harga']}')";
        mysqli_query($conn, $insert_sql);
    }
    
    // Update total price in undangan table
    $update_sql = "UPDATE undangan SET harga = harga + $total_addon_price WHERE id = $undangan_id";
    mysqli_query($conn, $update_sql);
    
    $success = "Add-on berhasil ditambahkan! Total tambahan: Rp " . number_format($total_addon_price, 0, ',', '.');
}

// Get invitation data
$undangan_id = $_GET['id'] ?? null;
if (!$undangan_id) {
    die('ID undangan tidak ditemukan!');
}

$sql = "SELECT * FROM undangan WHERE id = $undangan_id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die('Undangan tidak ditemukan!');
}

// Get available addons
$addons_sql = "SELECT * FROM addon WHERE is_active = 1 ORDER BY harga ASC";
$addons = mysqli_query($conn, $addons_sql);

// Get selected addons
$selected_sql = "SELECT addon_id FROM undangan_addon WHERE undangan_id = $undangan_id";
$selected_result = mysqli_query($conn, $selected_sql);
$selected_addons = [];
while ($row = mysqli_fetch_assoc($selected_result)) {
    $selected_addons[] = $row['addon_id'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Add-on - <?= $data['nama_pasangan'] ?></title>
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
  
  <div class="max-w-6xl mx-auto px-4">
    <!-- Header -->
    <div class="text-center mb-8">
      <h1 class="text-4xl font-heading font-bold text-purple-600 mb-2">Pilih Add-on</h1>
      <p class="text-gray-600">Tambahkan fitur khusus untuk undangan <?= $data['nama_pasangan'] ?></p>
    </div>

    <!-- Current Order Info -->
    <div class="bg-white rounded-2xl shadow-xl p-6 mb-8">
      <h2 class="text-2xl font-heading font-bold text-gray-800 mb-4">Informasi Pesanan</h2>
      <div class="grid md:grid-cols-2 gap-6">
        <div>
          <h3 class="text-xl font-semibold text-gray-700 mb-2"><?= $data['nama_pasangan'] ?></h3>
          <p class="text-gray-600 mb-1"><strong>Template:</strong> <?= ucfirst($data['template']) ?></p>
          <p class="text-gray-600 mb-1"><strong>Paket:</strong> <?= ucfirst($data['paket']) ?></p>
          <p class="text-gray-600"><strong>Tanggal Acara:</strong> <?= date('d F Y', strtotime($data['tanggal_acara'])) ?></p>
        </div>
        <div>
          <p class="text-gray-600 mb-1"><strong>Harga Template:</strong> Rp <?= number_format($data['harga'], 0, ',', '.') ?></p>
          <p class="text-gray-600 mb-1"><strong>Status:</strong> 
            <span class="px-2 py-1 text-xs font-semibold rounded-full <?= $data['status'] == 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
              <?= ucfirst($data['status']) ?>
            </span>
          </p>
        </div>
      </div>
    </div>

    <?php if (isset($success)): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
        <i class="fas fa-check-circle mr-2"></i><?= $success ?>
      </div>
    <?php endif; ?>

    <!-- Add-ons Selection -->
    <form method="POST" class="space-y-6">
      <input type="hidden" name="undangan_id" value="<?= $data['id'] ?>">
      
      <div class="bg-white rounded-2xl shadow-xl p-8">
        <h2 class="text-2xl font-heading font-bold text-gray-800 mb-6">Fitur Add-on (Opsional)</h2>
        <p class="text-gray-600 mb-8">Pilih fitur tambahan yang sesuai dengan kebutuhan acara Anda. Semua add-on bersifat opsional.</p>
        
        <div class="grid md:grid-cols-2 gap-6">
          <?php while ($addon = mysqli_fetch_assoc($addons)): ?>
          <div class="border border-gray-200 rounded-xl p-6 hover:border-purple-300 transition">
            <div class="flex items-start justify-between mb-4">
              <div class="flex items-center">
                <input type="checkbox" name="addons[]" value="<?= $addon['id'] ?>" 
                       <?= in_array($addon['id'], $selected_addons) ? 'checked' : '' ?>
                       class="mr-3 w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                <h3 class="text-lg font-semibold text-gray-800"><?= $addon['nama'] ?></h3>
              </div>
              <div class="text-right">
                <div class="text-xl font-bold text-purple-600">Rp <?= number_format($addon['harga'], 0, ',', '.') ?></div>
              </div>
            </div>
            
            <p class="text-gray-600 mb-4"><?= $addon['deskripsi'] ?></p>
            
            <!-- Add-on specific details -->
            <?php if ($addon['slug'] == 'sistem_sesi'): ?>
            <div class="bg-blue-50 p-3 rounded-lg">
              <p class="text-sm text-blue-800"><strong>Contoh:</strong> Tamu sesi 1 melihat info Akad, tamu sesi 2 melihat info Akad & Resepsi</p>
            </div>
            <?php elseif ($addon['slug'] == 'digital_guestbook'): ?>
            <div class="bg-green-50 p-3 rounded-lg">
              <p class="text-sm text-green-800"><strong>Fitur:</strong> QR Code unik per tamu, check-in otomatis, laporan kehadiran</p>
            </div>
            <?php elseif ($addon['slug'] == 'custom_rsvp'): ?>
            <div class="bg-yellow-50 p-3 rounded-lg">
              <p class="text-sm text-yellow-800"><strong>Contoh:</strong> Field tambahan untuk jenis kendaraan, pilihan acara (Akad/Resepsi)</p>
            </div>
            <?php elseif ($addon['slug'] == 'custom_domain'): ?>
            <div class="bg-purple-50 p-3 rounded-lg">
              <p class="text-sm text-purple-800"><strong>Contoh:</strong> www.Wedding-Ria-Rio.com</p>
            </div>
            <?php elseif ($addon['slug'] == 'multi_bahasa_2'): ?>
            <div class="bg-indigo-50 p-3 rounded-lg">
              <p class="text-sm text-indigo-800"><strong>Fitur:</strong> Tamu dapat memilih bahasa saat pertama kali membuka undangan</p>
            </div>
            <?php elseif ($addon['slug'] == 'add_yours_katalog'): ?>
            <div class="bg-pink-50 p-3 rounded-lg">
              <p class="text-sm text-pink-800"><strong>Fitur:</strong> Pilih dari katalog desain Add Yours yang tersedia</p>
            </div>
            <?php elseif ($addon['slug'] == 'add_yours_custom'): ?>
            <div class="bg-pink-50 p-3 rounded-lg">
              <p class="text-sm text-pink-800"><strong>Fitur:</strong> Desain custom sesuai keinginan Anda</p>
            </div>
            <?php endif; ?>
          </div>
          <?php endwhile; ?>
        </div>
        
        <!-- Total Price Display -->
        <div class="mt-8 p-6 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl">
          <div class="flex justify-between items-center">
            <div>
              <h3 class="text-lg font-semibold text-gray-800">Total Harga Add-on</h3>
              <p class="text-sm text-gray-600">Harga akan ditambahkan ke total pesanan</p>
            </div>
            <div class="text-right">
              <div id="total-addon-price" class="text-2xl font-bold text-purple-600">Rp 0</div>
            </div>
          </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 mt-8">
          <button type="submit" name="select_addon" 
                  class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-8 py-4 rounded-full font-semibold text-lg hover:from-pink-600 hover:to-purple-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            <i class="fas fa-shopping-cart mr-2"></i>
            Tambahkan Add-on
          </button>
          <a href="client-dashboard.php?slug=<?= $data['slug'] ?>&token=<?= $data['access_token'] ?>" 
             class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-4 rounded-full font-semibold text-lg transition shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Dashboard
          </a>
        </div>
      </div>
    </form>
  </div>

  <script>
    // Calculate total addon price
    function calculateTotal() {
      const checkboxes = document.querySelectorAll('input[name="addons[]"]:checked');
      let total = 0;
      
      checkboxes.forEach(checkbox => {
        const priceElement = checkbox.closest('.border').querySelector('.text-purple-600');
        const price = parseInt(priceElement.textContent.replace('Rp ', '').replace('.', ''));
        total += price;
      });
      
      document.getElementById('total-addon-price').textContent = 'Rp ' + total.toLocaleString('id-ID');
    }
    
    // Add event listeners to checkboxes
    document.querySelectorAll('input[name="addons[]"]').forEach(checkbox => {
      checkbox.addEventListener('change', calculateTotal);
    });
    
    // Calculate initial total
    calculateTotal();
  </script>

</body>
</html>
