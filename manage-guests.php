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

// Handle guest management
if ($_POST) {
    if (isset($_POST['add_guest'])) {
        $nama_tamu = $_POST['nama_tamu'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $kategori_tamu = $_POST['kategori_tamu'];
        $grup_id = $_POST['grup_id'] ?: null;
        $sesi_acara = $_POST['sesi_acara'] ?: null;
        
        $insert_sql = "INSERT INTO tamu (undangan_id, nama_tamu, email, no_hp, kategori_tamu, grup_id, sesi_acara) VALUES ('{$data['id']}', '$nama_tamu', '$email', '$no_hp', '$kategori_tamu', '$grup_id', '$sesi_acara')";
        mysqli_query($conn, $insert_sql);
        $success = "Tamu berhasil ditambahkan!";
    }
    
    if (isset($_POST['delete_guest'])) {
        $guest_id = $_POST['guest_id'];
        $delete_sql = "DELETE FROM tamu WHERE id = $guest_id AND undangan_id = {$data['id']}";
        mysqli_query($conn, $delete_sql);
        $success = "Tamu berhasil dihapus!";
    }
    
    if (isset($_POST['add_group'])) {
        $nama_grup = $_POST['nama_grup'];
        $deskripsi = $_POST['deskripsi'];
        
        $insert_sql = "INSERT INTO grup_tamu (undangan_id, nama_grup, deskripsi) VALUES ('{$data['id']}', '$nama_grup', '$deskripsi')";
        mysqli_query($conn, $insert_sql);
        $success = "Grup tamu berhasil ditambahkan!";
    }
    
    if (isset($_POST['update_template'])) {
        $template_whatsapp = $_POST['template_whatsapp'];
        
        // Check if template exists
        $check_sql = "SELECT id FROM template_pesan WHERE undangan_id = {$data['id']} AND jenis_pesan = 'whatsapp'";
        $check_result = mysqli_query($conn, $check_sql);
        
        if (mysqli_num_rows($check_result) > 0) {
            $update_sql = "UPDATE template_pesan SET template_pesan = '$template_whatsapp' WHERE undangan_id = {$data['id']} AND jenis_pesan = 'whatsapp'";
        } else {
            $update_sql = "INSERT INTO template_pesan (undangan_id, jenis_pesan, template_pesan) VALUES ('{$data['id']}', 'whatsapp', '$template_whatsapp')";
        }
        mysqli_query($conn, $update_sql);
        $success = "Template pesan berhasil disimpan!";
    }
}

// Get guests
$guests_sql = "SELECT t.*, gt.nama_grup FROM tamu t 
               LEFT JOIN grup_tamu gt ON t.grup_id = gt.id 
               WHERE t.undangan_id = {$data['id']} 
               ORDER BY t.created_at DESC";
$guests = mysqli_query($conn, $guests_sql);

// Get groups
$groups_sql = "SELECT * FROM grup_tamu WHERE undangan_id = {$data['id']} ORDER BY nama_grup";
$groups = mysqli_query($conn, $groups_sql);

// Get template pesan
$template_sql = "SELECT template_pesan FROM template_pesan WHERE undangan_id = {$data['id']} AND jenis_pesan = 'whatsapp'";
$template_result = mysqli_query($conn, $template_sql);
$template_pesan = mysqli_fetch_assoc($template_result)['template_pesan'] ?? '';

// Get add-ons
$addons_sql = "SELECT a.* FROM addon a 
               JOIN undangan_addon ua ON a.id = ua.addon_id 
               WHERE ua.undangan_id = {$data['id']} AND ua.status = 'active'";
$addons = mysqli_query($conn, $addons_sql);
$has_sesi = false;
$has_custom_rsvp = false;
while ($addon = mysqli_fetch_assoc($addons)) {
    if ($addon['slug'] == 'sistem_sesi') $has_sesi = true;
    if ($addon['slug'] == 'custom_rsvp') $has_custom_rsvp = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Tamu - <?= $data['nama_pasangan'] ?></title>
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
          <h1 class="text-2xl font-heading font-bold text-purple-600">Kelola Tamu</h1>
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

    <!-- Add Guest Form -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
      <h2 class="text-2xl font-heading font-bold text-gray-800 mb-6">Tambah Tamu</h2>
      
      <form method="POST" class="space-y-6">
        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
            <input type="text" name="nama_tamu" required 
                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                   placeholder="Masukkan nama lengkap">
          </div>
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
            <input type="email" name="email" 
                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                   placeholder="email@example.com">
          </div>
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp</label>
            <input type="tel" name="no_hp" 
                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                   placeholder="081234567890">
          </div>
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Tamu</label>
            <select name="kategori_tamu" 
                    class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
              <option value="umum">Umum</option>
              <option value="pihak_a">Pihak A (<?= $data['nama_pria'] ?>)</option>
              <option value="pihak_b">Pihak B (<?= $data['nama_wanita'] ?>)</option>
            </select>
          </div>
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Grup Tamu</label>
            <select name="grup_id" 
                    class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
              <option value="">Pilih Grup (Opsional)</option>
              <?php while ($group = mysqli_fetch_assoc($groups)): ?>
              <option value="<?= $group['id'] ?>"><?= $group['nama_grup'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          
          <?php if ($has_sesi): ?>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Sesi Acara</label>
            <select name="sesi_acara" 
                    class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
              <option value="">Pilih Sesi</option>
              <option value="akad">Akad Nikah</option>
              <option value="resepsi">Resepsi</option>
              <option value="akad_resepsi">Akad & Resepsi</option>
            </select>
          </div>
          <?php endif; ?>
        </div>
        
        <div class="text-center">
          <button type="submit" name="add_guest" 
                  class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-8 py-3 rounded-full font-semibold hover:from-pink-600 hover:to-purple-700 transition shadow-lg hover:shadow-xl">
            <i class="fas fa-plus mr-2"></i>Tambah Tamu
          </button>
        </div>
      </form>
    </div>

    <!-- Add Group Form -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
      <h2 class="text-2xl font-heading font-bold text-gray-800 mb-6">Tambah Grup Tamu</h2>
      
      <form method="POST" class="space-y-6">
        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Grup *</label>
            <input type="text" name="nama_grup" required 
                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                   placeholder="Contoh: Keluarga Besar, Teman Kantor">
          </div>
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
            <input type="text" name="deskripsi" 
                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                   placeholder="Deskripsi grup (opsional)">
          </div>
        </div>
        
        <div class="text-center">
          <button type="submit" name="add_group" 
                  class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-8 py-3 rounded-full font-semibold hover:from-blue-600 hover:to-indigo-700 transition shadow-lg hover:shadow-xl">
            <i class="fas fa-users mr-2"></i>Tambah Grup
          </button>
        </div>
      </form>
    </div>

    <!-- Template Pesan -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
      <h2 class="text-2xl font-heading font-bold text-gray-800 mb-6">Template Pesan WhatsApp</h2>
      
      <form method="POST" class="space-y-6">
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Template Pesan</label>
          <textarea name="template_whatsapp" rows="6" 
                    class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    placeholder="Halo {nama_tamu}, Anda diundang untuk menghadiri pernikahan {nama_pasangan} pada {tanggal_acara} di {lokasi}. Silakan konfirmasi kehadiran Anda melalui link berikut: {link_undangan}"><?= htmlspecialchars($template_pesan) ?></textarea>
          <p class="text-sm text-gray-600 mt-2">
            <strong>Variabel yang tersedia:</strong> {nama_tamu}, {nama_pasangan}, {tanggal_acara}, {lokasi}, {link_undangan}
          </p>
        </div>
        
        <div class="text-center">
          <button type="submit" name="update_template" 
                  class="bg-gradient-to-r from-green-500 to-teal-600 text-white px-8 py-3 rounded-full font-semibold hover:from-green-600 hover:to-teal-700 transition shadow-lg hover:shadow-xl">
            <i class="fas fa-save mr-2"></i>Simpan Template
          </button>
        </div>
      </form>
    </div>

    <!-- Guests List -->
    <div class="bg-white rounded-xl shadow-md">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Daftar Tamu</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grup</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status RSVP</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php while ($guest = mysqli_fetch_assoc($guests)): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900"><?= $guest['nama_tamu'] ?></div>
                <div class="text-sm text-gray-500"><?= $guest['sudah_buka_undangan'] ? 'Sudah buka' : 'Belum buka' ?></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900"><?= $guest['email'] ?></div>
                <div class="text-sm text-gray-500"><?= $guest['no_hp'] ?></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <?php
                $kategori_color = '';
                $kategori_text = '';
                switch($guest['kategori_tamu']) {
                    case 'pihak_a': $kategori_color = 'bg-blue-100 text-blue-800'; $kategori_text = 'Pihak A'; break;
                    case 'pihak_b': $kategori_color = 'bg-pink-100 text-pink-800'; $kategori_text = 'Pihak B'; break;
                    case 'umum': $kategori_color = 'bg-gray-100 text-gray-800'; $kategori_text = 'Umum'; break;
                }
                ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $kategori_color ?>">
                  <?= $kategori_text ?>
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                <?= $guest['nama_grup'] ?: '-' ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <?php
                $status_color = '';
                $status_text = '';
                switch($guest['status_rsvp']) {
                    case 'coming': $status_color = 'bg-green-100 text-green-800'; $status_text = 'Akan Hadir'; break;
                    case 'not_coming': $status_color = 'bg-red-100 text-red-800'; $status_text = 'Tidak Hadir'; break;
                    case 'pending': $status_color = 'bg-yellow-100 text-yellow-800'; $status_text = 'Belum Konfirmasi'; break;
                }
                ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $status_color ?>">
                  <?= $status_text ?>
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-2">
                  <button onclick="copyLink('<?= $guest['id'] ?>')" class="text-blue-600 hover:text-blue-900">
                    <i class="fas fa-copy"></i>
                  </button>
                  <?php if ($guest['no_hp']): ?>
                  <button onclick="sendWhatsApp('<?= $guest['no_hp'] ?>', '<?= $guest['nama_tamu'] ?>')" class="text-green-600 hover:text-green-900">
                    <i class="fab fa-whatsapp"></i>
                  </button>
                  <?php endif; ?>
                  <form method="POST" class="inline">
                    <input type="hidden" name="guest_id" value="<?= $guest['id'] ?>">
                    <button type="submit" name="delete_guest" onclick="return confirm('Yakin hapus tamu ini?')" class="text-red-600 hover:text-red-900">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
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
    function copyLink(guestId) {
      const link = window.location.origin + '/rsvp.php?slug=<?= $data['slug'] ?>&guest=' + guestId;
      navigator.clipboard.writeText(link).then(() => {
        alert('Link berhasil disalin!');
      });
    }
    
    function sendWhatsApp(phone, name) {
      const namaPasangan = '<?= $data['nama_pasangan'] ?>';
      const tanggalAcara = '<?= date('d F Y', strtotime($data['tanggal_acara'])) ?>';
      const lokasi = '<?= $data['lokasi'] ?>';
      const linkUndangan = '<?= $_SERVER['HTTP_HOST'] ?>/rsvp.php?slug=<?= $data['slug'] ?>';
      const templatePesan = '<?= addslashes($template_pesan) ?>';
      
      const template = templatePesan
        .replace('{nama_tamu}', name)
        .replace('{nama_pasangan}', namaPasangan)
        .replace('{tanggal_acara}', tanggalAcara)
        .replace('{lokasi}', lokasi)
        .replace('{link_undangan}', linkUndangan);
      
      const whatsappUrl = `https://wa.me/${phone.replace(/[^0-9]/g, '')}?text=${encodeURIComponent(template)}`;
      window.open(whatsappUrl, '_blank');
    }
  </script>

</body>
</html>
