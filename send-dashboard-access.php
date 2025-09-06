<?php
include 'db.php';

// Handle sending dashboard access
if ($_POST && isset($_POST['send_access'])) {
    $undangan_id = $_POST['undangan_id'];
    
    // Get invitation data
    $sql = "SELECT * FROM undangan WHERE id = $undangan_id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    
    if ($data) {
        // Generate access token if not exists
        if (!$data['access_token']) {
            $access_token = bin2hex(random_bytes(32));
            $update_sql = "UPDATE undangan SET access_token = '$access_token' WHERE id = $undangan_id";
            mysqli_query($conn, $update_sql);
        } else {
            $access_token = $data['access_token'];
        }
        
        // Dashboard URL
        $dashboard_url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . "/client-dashboard.php?slug=" . $data['slug'] . "&token=" . $access_token;
        
        // Send email (simulated - in real implementation, you'd use PHPMailer or similar)
        $subject = "Akses Dashboard Undangan - " . $data['nama_pasangan'];
        $message = "
        <html>
        <head>
            <title>Akses Dashboard Undangan</title>
        </head>
        <body>
            <h2>Selamat! Undangan Anda sudah siap</h2>
            <p>Undangan pernikahan <strong>" . $data['nama_pasangan'] . "</strong> sudah selesai dikerjakan.</p>
            
            <h3>Akses Dashboard:</h3>
            <p>Anda dapat mengakses dashboard untuk melihat statistik undangan melalui link berikut:</p>
            <a href='" . $dashboard_url . "' style='background: #8B5CF6; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; display: inline-block;'>Akses Dashboard</a>
            
            <h3>Link Undangan:</h3>
            <p>Undangan Anda dapat diakses melalui:</p>
            <a href='http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . "/invitation.php?slug=" . $data['slug'] . "' style='background: #EC4899; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; display: inline-block;'>Lihat Undangan</a>
            
            <h3>Link RSVP:</h3>
            <p>Tamu dapat mengisi konfirmasi kehadiran melalui:</p>
            <a href='http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . "/rsvp.php?slug=" . $data['slug'] . "' style='background: #10B981; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; display: inline-block;'>Form RSVP</a>
            
            <hr>
            <p><small>Dashboard ini hanya dapat diakses oleh pemilik acara dan akan aktif selama 1 tahun dari tanggal acara.</small></p>
        </body>
        </html>
        ";
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: noreply@undangandigital.com" . "\r\n";
        
        if (mail($data['email'], $subject, $message, $headers)) {
            $success = "Akses dashboard telah dikirim ke email " . $data['email'];
        } else {
            $error = "Gagal mengirim email. Silakan coba lagi.";
        }
    }
}

// Get all completed invitations
$sql = "SELECT * FROM undangan WHERE status = 'completed' ORDER BY created_at DESC";
$invitations = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kirim Akses Dashboard - Admin Panel</title>
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
          <h1 class="text-2xl font-heading font-bold text-purple-600">Kirim Akses Dashboard</h1>
        </div>
        <div class="flex items-center space-x-4">
          <a href="admin/dashboard.php" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-medium transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Admin
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

    <?php if (isset($error)): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
        <i class="fas fa-exclamation-circle mr-2"></i><?= $error ?>
      </div>
    <?php endif; ?>

    <!-- Instructions -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
      <h2 class="text-2xl font-heading font-bold text-gray-800 mb-4">Instruksi</h2>
      <div class="space-y-3 text-gray-600">
        <p>• Kirim akses dashboard kepada pemilik acara setelah undangan selesai dikerjakan</p>
        <p>• Dashboard akan berisi statistik tamu, RSVP, dan data undangan</p>
        <p>• Akses dashboard hanya berlaku untuk pemilik acara</p>
        <p>• Undangan aktif selama 1 tahun dari tanggal acara</p>
      </div>
    </div>

    <!-- Completed Invitations -->
    <div class="bg-white rounded-xl shadow-md">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Undangan yang Sudah Selesai</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event Details</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Template</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paket</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php while ($invitation = mysqli_fetch_assoc($invitations)): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">#<?= $invitation['id'] ?></div>
                <div class="text-sm text-gray-500"><?= date('d M Y', strtotime($invitation['created_at'])) ?></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900"><?= $invitation['nama_pasangan'] ?></div>
                <div class="text-sm text-gray-500"><?= $invitation['email'] ?></div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900"><?= date('d M Y', strtotime($invitation['tanggal_acara'])) ?></div>
                <div class="text-sm text-gray-500"><?= $invitation['lokasi'] ?></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                  <?= ucfirst($invitation['template']) ?>
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  <?= ucfirst($invitation['paket']) ?>
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Completed
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-2">
                  <form method="POST" class="inline">
                    <input type="hidden" name="undangan_id" value="<?= $invitation['id'] ?>">
                    <button type="submit" name="send_access" 
                            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                      <i class="fas fa-paper-plane mr-1"></i>Kirim Akses
                    </button>
                  </form>
                  <a href="invitation.php?slug=<?= $invitation['slug'] ?>" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                    <i class="fas fa-eye mr-1"></i>Preview
                  </a>
                </div>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>
</html>
