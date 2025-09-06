<?php
session_start();
include '../db.php';

// Check login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get all clients (customers)
$sql = "SELECT DISTINCT email, kontak_wa, COUNT(*) as total_orders, MAX(created_at) as last_order 
        FROM undangan 
        WHERE email IS NOT NULL AND email != '' 
        GROUP BY email, kontak_wa 
        ORDER BY last_order DESC";
$clients = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clients - Admin Panel</title>
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
      <a href="clients.php" class="flex items-center px-6 py-3 text-purple-600 bg-purple-50 border-r-4 border-purple-600">
        <i class="fas fa-users mr-3"></i>
        Clients
      </a>
      <a href="templates.php" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600 transition">
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
          <h2 class="text-2xl font-heading font-bold text-gray-800">Clients Management</h2>
          <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-500"><?= date('d F Y, H:i') ?></span>
          </div>
        </div>
      </div>
    </header>

    <!-- Content -->
    <main class="p-6">
      <div class="bg-white rounded-xl shadow-md">
        <div class="px-6 py-4 border-b border-gray-200">
          <h3 class="text-lg font-semibold text-gray-800">All Clients</h3>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client Info</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Orders</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Order</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php while ($client = mysqli_fetch_assoc($clients)): ?>
              <?php
              // Get client's orders
              $client_sql = "SELECT * FROM undangan WHERE email = '{$client['email']}' ORDER BY created_at DESC";
              $client_orders = mysqli_query($conn, $client_sql);
              $first_order = mysqli_fetch_assoc($client_orders);
              ?>
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center">
                      <i class="fas fa-user text-white"></i>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900"><?= $first_order['nama_pasangan'] ?></div>
                      <div class="text-sm text-gray-500"><?= $client['email'] ?></div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900"><?= $client['kontak_wa'] ?></div>
                  <div class="text-sm text-gray-500"><?= $client['email'] ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                    <?= $client['total_orders'] ?> Orders
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?= date('d M Y', strtotime($client['last_order'])) ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex space-x-2">
                    <a href="orders.php?email=<?= urlencode($client['email']) ?>" class="text-blue-600 hover:text-blue-900">
                      <i class="fas fa-eye"></i> View Orders
                    </a>
                    <?php if ($client['kontak_wa']): ?>
                    <a href="https://wa.me/<?= str_replace(['+', '-', ' '], '', $client['kontak_wa']) ?>" target="_blank" class="text-green-600 hover:text-green-900">
                      <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                    <?php endif; ?>
                    <a href="mailto:<?= $client['email'] ?>" class="text-purple-600 hover:text-purple-900">
                      <i class="fas fa-envelope"></i> Email
                    </a>
                  </div>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

</body>
</html>
