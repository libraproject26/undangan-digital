<?php
session_start();
include '../db.php';

// Check login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get statistics
$stats = [];

// Total undangan
$sql = "SELECT COUNT(*) as total FROM undangan";
$result = mysqli_query($conn, $sql);
$stats['total_undangan'] = mysqli_fetch_assoc($result)['total'];

// Undangan pending
$sql = "SELECT COUNT(*) as total FROM undangan WHERE status = 'pending'";
$result = mysqli_query($conn, $sql);
$stats['pending'] = mysqli_fetch_assoc($result)['total'];

// Undangan completed
$sql = "SELECT COUNT(*) as total FROM undangan WHERE status = 'completed'";
$result = mysqli_query($conn, $sql);
$stats['completed'] = mysqli_fetch_assoc($result)['total'];

// Total revenue
$sql = "SELECT SUM(harga) as total FROM undangan WHERE status_pembayaran = 'paid'";
$result = mysqli_query($conn, $sql);
$stats['revenue'] = mysqli_fetch_assoc($result)['total'] ?? 0;

// Recent orders
$sql = "SELECT * FROM undangan ORDER BY created_at DESC LIMIT 5";
$recent_orders = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Undangan Digital</title>
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
            'fadeIn': 'fadeIn 0.5s ease-in-out',
            'slideUp': 'slideUp 0.5s ease-out',
            'pulse-slow': 'pulse 3s ease-in-out infinite',
          },
          keyframes: {
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

    html, body {
      overflow-x: hidden;
      overflow-y: auto;
    }

    .card-hover {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .stat-card {
      background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
    }

    .sidebar-gradient {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
  </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 font-body relative">
  
  <!-- Background decoration -->
  <div class="absolute inset-0 opacity-5">
    <div class="absolute top-20 left-20 w-40 h-40 bg-purple-500 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-20 w-60 h-60 bg-pink-500 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full blur-3xl"></div>
  </div>
  
  <!-- Sidebar -->
  <div class="fixed inset-y-0 left-0 z-50 w-72 bg-white shadow-2xl border-r border-gray-100">
    <div class="flex items-center justify-center h-20 sidebar-gradient">
      <div class="text-center">
        <h1 class="text-white text-2xl font-heading font-bold">Admin Panel</h1>
        <p class="text-white/80 text-sm">Undangan Digital</p>
      </div>
    </div>
    
    <nav class="mt-8 px-4">
      <a href="dashboard.php" class="flex items-center px-6 py-4 text-purple-600 bg-gradient-to-r from-purple-50 to-pink-50 border-r-4 border-purple-600 rounded-l-xl mb-2 card-hover">
        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
          <i class="fas fa-tachometer-alt text-white"></i>
        </div>
        <div>
          <p class="font-semibold">Dashboard</p>
          <p class="text-xs text-gray-500">Overview & Statistics</p>
        </div>
      </a>
      
      <a href="orders.php" class="flex items-center px-6 py-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-purple-600 transition-all duration-300 rounded-l-xl mb-2 card-hover">
        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-4 group-hover:bg-gradient-to-r group-hover:from-blue-500 group-hover:to-purple-500 transition-all duration-300">
          <i class="fas fa-shopping-cart text-gray-600 group-hover:text-white transition-colors"></i>
        </div>
        <div>
          <p class="font-semibold">Orders</p>
          <p class="text-xs text-gray-500">Manage Orders</p>
        </div>
      </a>
      
      <a href="clients.php" class="flex items-center px-6 py-4 text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-blue-50 hover:text-green-600 transition-all duration-300 rounded-l-xl mb-2 card-hover">
        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-4 group-hover:bg-gradient-to-r group-hover:from-green-500 group-hover:to-blue-500 transition-all duration-300">
          <i class="fas fa-users text-gray-600 group-hover:text-white transition-colors"></i>
        </div>
        <div>
          <p class="font-semibold">Clients</p>
          <p class="text-xs text-gray-500">Customer Management</p>
        </div>
      </a>
      
      <a href="templates.php" class="flex items-center px-6 py-4 text-gray-700 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-orange-50 hover:text-yellow-600 transition-all duration-300 rounded-l-xl mb-2 card-hover">
        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-4 group-hover:bg-gradient-to-r group-hover:from-yellow-500 group-hover:to-orange-500 transition-all duration-300">
          <i class="fas fa-palette text-gray-600 group-hover:text-white transition-colors"></i>
        </div>
        <div>
          <p class="font-semibold">Templates</p>
          <p class="text-xs text-gray-500">Design Management</p>
        </div>
      </a>
    </nav>
    
    <div class="absolute bottom-0 w-full p-6">
      <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-4 mb-4">
        <div class="flex items-center mb-3">
          <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
            <i class="fas fa-user text-white text-lg"></i>
          </div>
          <div class="ml-3">
            <p class="text-sm font-semibold text-gray-800"><?= $_SESSION['admin_nama'] ?></p>
            <p class="text-xs text-gray-500"><?= ucfirst($_SESSION['admin_role']) ?></p>
          </div>
        </div>
        <a href="logout.php" class="flex items-center text-red-600 hover:text-red-800 transition-all duration-300 group">
          <i class="fas fa-sign-out-alt mr-3 group-hover:scale-110 transition-transform"></i>
          <span class="font-medium">Logout</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="ml-72">
    <!-- Header -->
    <header class="bg-white/80 backdrop-blur-sm shadow-lg border-b border-gray-200 sticky top-0 z-40">
      <div class="px-8 py-6">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-3xl font-heading font-bold gradient-text">Dashboard</h2>
            <p class="text-gray-600 mt-1">Selamat datang kembali, <span class="font-semibold text-purple-600"><?= $_SESSION['admin_nama'] ?></span>!</p>
          </div>
          <div class="flex items-center space-x-4">
            <div class="text-right">
              <p class="text-sm text-gray-500">Last Login</p>
              <p class="text-sm font-semibold text-gray-800"><?= date('d M Y, H:i') ?></p>
            </div>
            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
              <i class="fas fa-user text-white"></i>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Content -->
    <main class="p-8 relative z-10">
      <!-- Stats Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-md p-6">
          <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-lg">
              <i class="fas fa-envelope text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-600">Total Undangan</p>
              <p class="text-2xl font-bold text-gray-900"><?= $stats['total_undangan'] ?></p>
            </div>
          </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">
          <div class="flex items-center">
            <div class="p-3 bg-yellow-100 rounded-lg">
              <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-600">Pending</p>
              <p class="text-2xl font-bold text-gray-900"><?= $stats['pending'] ?></p>
            </div>
          </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">
          <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-lg">
              <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-600">Completed</p>
              <p class="text-2xl font-bold text-gray-900"><?= $stats['completed'] ?></p>
            </div>
          </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">
          <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-lg">
              <i class="fas fa-dollar-sign text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-600">Revenue</p>
              <p class="text-2xl font-bold text-gray-900">Rp <?= number_format($stats['revenue'], 0, ',', '.') ?></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Orders -->
      <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="px-8 py-6 bg-gradient-to-r from-purple-50 to-pink-50 border-b border-gray-200">
          <div class="flex items-center justify-between">
            <h3 class="text-xl font-heading font-bold text-gray-800">Recent Orders</h3>
            <a href="orders.php" class="text-purple-600 hover:text-purple-800 font-medium text-sm flex items-center group">
              View All <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Order</th>
                <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Customer</th>
                <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Template</th>
                <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Paket</th>
                <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
              <?php while ($order = mysqli_fetch_assoc($recent_orders)): ?>
              <tr class="hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-300">
                <td class="px-8 py-6 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-3">
                      <span class="text-white text-xs font-bold">#</span>
                    </div>
                    <span class="text-sm font-semibold text-gray-900"><?= $order['id'] ?></span>
                  </div>
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-3">
                      <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div>
                      <div class="text-sm font-semibold text-gray-900"><?= $order['nama_pasangan'] ?></div>
                      <div class="text-sm text-gray-500"><?= $order['email'] ?></div>
                    </div>
                  </div>
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                    <i class="fas fa-palette mr-1"></i>
                    <?= ucfirst($order['template']) ?>
                  </span>
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                    <i class="fas fa-star mr-1"></i>
                    <?= ucfirst($order['paket']) ?>
                  </span>
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                  <?php
                  $status_color = '';
                  switch($order['status']) {
                      case 'pending': $status_color = 'bg-yellow-100 text-yellow-800'; break;
                      case 'processing': $status_color = 'bg-blue-100 text-blue-800'; break;
                      case 'completed': $status_color = 'bg-green-100 text-green-800'; break;
                      case 'cancelled': $status_color = 'bg-red-100 text-red-800'; break;
                  }
                  ?>
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold <?= $status_color ?>">
                    <i class="fas fa-circle text-xs mr-1"></i>
                    <?= ucfirst($order['status']) ?>
                  </span>
                </td>
                <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-500">
                  <?= date('d M Y', strtotime($order['created_at'])) ?>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-blue-50 border-t border-gray-200">
          <a href="orders.php" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white text-sm font-semibold rounded-full hover:from-purple-600 hover:to-pink-600 transition-all duration-300 group">
            View All Orders <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
          </a>
        </div>
      </div>
    </main>
  </div>

</body>
</html>
