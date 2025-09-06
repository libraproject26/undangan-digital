<?php
session_start();
include '../db.php';

// Check login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Handle status update
if ($_POST && isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $sql = "UPDATE undangan SET status = '$status' WHERE id = $id";
    mysqli_query($conn, $sql);
    header('Location: orders.php');
    exit();
}

// Get all orders
$sql = "SELECT * FROM undangan ORDER BY created_at DESC";
$orders = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders - Admin Panel</title>
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
      <a href="orders.php" class="flex items-center px-6 py-3 text-purple-600 bg-purple-50 border-r-4 border-purple-600">
        <i class="fas fa-shopping-cart mr-3"></i>
        Orders
      </a>
      <a href="clients.php" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-purple-600 transition">
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
          <h2 class="text-2xl font-heading font-bold text-gray-800">Orders Management</h2>
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
          <h3 class="text-lg font-semibold text-gray-800">All Orders</h3>
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
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php while ($order = mysqli_fetch_assoc($orders)): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">#<?= $order['id'] ?></div>
                  <div class="text-sm text-gray-500"><?= date('d M Y', strtotime($order['created_at'])) ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900"><?= $order['nama_pasangan'] ?></div>
                  <div class="text-sm text-gray-500"><?= $order['email'] ?></div>
                  <div class="text-sm text-gray-500"><?= $order['kontak_wa'] ?></div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900"><?= date('d M Y', strtotime($order['tanggal_acara'])) ?></div>
                  <div class="text-sm text-gray-500"><?= $order['waktu_acara'] ?></div>
                  <div class="text-sm text-gray-500"><?= $order['lokasi'] ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                    <?= ucfirst($order['template']) ?>
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <?= ucfirst($order['paket']) ?>
                  </span>
                  <div class="text-sm text-gray-500 mt-1">Rp <?= number_format($order['harga'], 0, ',', '.') ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <?php
                  $status_color = '';
                  switch($order['status']) {
                      case 'pending': $status_color = 'bg-yellow-100 text-yellow-800'; break;
                      case 'processing': $status_color = 'bg-blue-100 text-blue-800'; break;
                      case 'completed': $status_color = 'bg-green-100 text-green-800'; break;
                      case 'cancelled': $status_color = 'bg-red-100 text-red-800'; break;
                  }
                  ?>
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $status_color ?>">
                    <?= ucfirst($order['status']) ?>
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <?php
                  $payment_color = '';
                  switch($order['status_pembayaran']) {
                      case 'pending': $payment_color = 'bg-yellow-100 text-yellow-800'; break;
                      case 'paid': $payment_color = 'bg-green-100 text-green-800'; break;
                      case 'failed': $payment_color = 'bg-red-100 text-red-800'; break;
                  }
                  ?>
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $payment_color ?>">
                    <?= ucfirst($order['status_pembayaran']) ?>
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex space-x-2">
                    <form method="POST" class="inline">
                      <input type="hidden" name="id" value="<?= $order['id'] ?>">
                      <select name="status" onchange="this.form.submit()" class="text-xs border border-gray-300 rounded px-2 py-1">
                        <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="processing" <?= $order['status'] == 'processing' ? 'selected' : '' ?>>Processing</option>
                        <option value="completed" <?= $order['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                        <option value="cancelled" <?= $order['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                      </select>
                      <input type="hidden" name="update_status" value="1">
                    </form>
                    <a href="../invitation.php?slug=<?= $order['slug'] ?>" target="_blank" class="text-blue-600 hover:text-blue-900">
                      <i class="fas fa-eye"></i>
                    </a>
                    <?php if ($order['status'] == 'completed'): ?>
                    <a href="../send-dashboard-access.php" class="text-purple-600 hover:text-purple-900">
                      <i class="fas fa-paper-plane"></i>
                    </a>
                    <?php endif; ?>
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
