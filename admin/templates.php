<?php
session_start();
include '../db.php';

// Check login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get all templates
$sql = "SELECT * FROM template ORDER BY created_at DESC";
$templates = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Templates - Admin Panel</title>
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
  
  <!-- Sidebar -->
  <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg">
    <div class="flex items-center justify-center h-16 bg-gradient-to-r from-purple-600 to-pink-600">
      <h1 class="text-white text-xl font-heading font-bold">Admin Panel</h1>
    </div>
    
    <nav class="mt-8">
      <a href="dashboard.php" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600 transition">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Dashboard
      </a>
      <a href="orders.php" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600 transition">
        <i class="fas fa-shopping-cart mr-3"></i>
        Orders
      </a>
      <a href="clients.php" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600 transition">
        <i class="fas fa-users mr-3"></i>
        Clients
      </a>
      <a href="templates.php" class="flex items-center px-6 py-3 text-purple-600 bg-purple-50 border-r-4 border-purple-600">
        <i class="fas fa-palette mr-3"></i>
        Templates
      </a>
    </nav>
    
    <div class="absolute bottom-0 w-full p-6">
      <div class="flex items-center mb-4">
        <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center">
          <i class="fas fa-user text-white"></i>
        </div>
        <div class="ml-3">
          <p class="text-sm font-semibold text-gray-800"><?= $_SESSION['admin_nama'] ?></p>
          <p class="text-xs text-gray-500"><?= ucfirst($_SESSION['admin_role']) ?></p>
        </div>
      </div>
      <a href="logout.php" class="flex items-center text-red-600 hover:text-red-800 transition">
        <i class="fas fa-sign-out-alt mr-2"></i>
        Logout
      </a>
    </div>
  </div>

  <!-- Main Content -->
  <div class="ml-64">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
      <div class="px-6 py-4">
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-heading font-bold text-gray-800">Templates Management</h2>
          <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-500"><?= date('d F Y, H:i') ?></span>
          </div>
        </div>
      </div>
    </header>

    <!-- Content -->
    <main class="p-6">
      <!-- Templates Grid -->
      <div class="grid md:grid-cols-3 gap-6 mb-8">
        <?php while ($template = mysqli_fetch_assoc($templates)): ?>
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="h-48 bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
            <div class="text-6xl">
              <?php
              switch($template['slug']) {
                  case 'classic': echo '💌'; break;
                  case 'modern': echo '💍'; break;
                  case 'luxury': echo '👑'; break;
                  default: echo '📄';
              }
              ?>
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-heading font-bold text-gray-800 mb-2"><?= $template['nama'] ?></h3>
            <p class="text-gray-600 mb-4"><?= $template['deskripsi'] ?></p>
            
            <div class="space-y-2 mb-4">
              <div class="flex justify-between">
                <span class="text-sm text-gray-500">Basic:</span>
                <span class="text-sm font-semibold">Rp <?= number_format($template['harga_basic'], 0, ',', '.') ?></span>
              </div>
              <div class="flex justify-between">
                <span class="text-sm text-gray-500">Premium:</span>
                <span class="text-sm font-semibold">Rp <?= number_format($template['harga_premium'], 0, ',', '.') ?></span>
              </div>
              <div class="flex justify-between">
                <span class="text-sm text-gray-500">Exclusive:</span>
                <span class="text-sm font-semibold">Rp <?= number_format($template['harga_exclusive'], 0, ',', '.') ?></span>
              </div>
            </div>
            
            <div class="flex items-center justify-between">
              <span class="px-2 py-1 text-xs font-semibold rounded-full <?= $template['is_active'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                <?= $template['is_active'] ? 'Active' : 'Inactive' ?>
              </span>
              <a href="../templates/<?= $template['slug'] ?>.php" target="_blank" class="text-purple-600 hover:text-purple-800">
                <i class="fas fa-eye"></i> Preview
              </a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>

      <!-- Template Statistics -->
      <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-6">Template Usage Statistics</h3>
        <div class="grid md:grid-cols-3 gap-6">
          <?php
          $template_stats = ['classic', 'modern', 'luxury'];
          foreach ($template_stats as $template_slug):
            $sql = "SELECT COUNT(*) as count FROM undangan WHERE template = '$template_slug'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_fetch_assoc($result)['count'];
          ?>
          <div class="text-center p-4 bg-gray-50 rounded-lg">
            <div class="text-3xl mb-2">
              <?php
              switch($template_slug) {
                  case 'classic': echo '💌'; break;
                  case 'modern': echo '💍'; break;
                  case 'luxury': echo '👑'; break;
              }
              ?>
            </div>
            <h4 class="font-semibold text-gray-800 mb-1"><?= ucfirst($template_slug) ?></h4>
            <p class="text-2xl font-bold text-purple-600"><?= $count ?></p>
            <p class="text-sm text-gray-500">Orders</p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </main>
  </div>

</body>
</html>