<?php
session_start();
include '../db.php';

// Redirect jika sudah login
if (isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit();
}

$error = '';

if ($_POST && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_nama'] = $admin['nama_lengkap'];
            $_SESSION['admin_role'] = $admin['role'];
            header('Location: dashboard.php');
            exit();
        } else {
            $error = 'Password salah!';
        }
    } else {
        $error = 'Username tidak ditemukan!';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Undangan Digital</title>
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
<body class="bg-gradient-to-br from-purple-600 to-pink-600 font-body min-h-screen flex items-center justify-center p-4">
  
  <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
    <div class="text-center mb-8">
      <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="fas fa-user-shield text-white text-2xl"></i>
      </div>
      <h1 class="text-3xl font-heading font-bold text-gray-800">Admin Login</h1>
      <p class="text-gray-600 mt-2">Masuk ke panel administrasi</p>
    </div>

    <?php if ($error): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
        <i class="fas fa-exclamation-circle mr-2"></i><?= $error ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-6">
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
          <i class="fas fa-user mr-2"></i>Username
        </label>
        <input type="text" name="username" required 
               class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
               placeholder="Masukkan username">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
          <i class="fas fa-lock mr-2"></i>Password
        </label>
        <input type="password" name="password" required 
               class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
               placeholder="Masukkan password">
      </div>

      <button type="submit" name="login" 
              class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-4 rounded-lg font-semibold text-lg hover:from-purple-600 hover:to-pink-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
        <i class="fas fa-sign-in-alt mr-2"></i>
        Masuk
      </button>
    </form>

    <div class="text-center mt-6">
      <a href="../index.php" class="text-purple-600 hover:text-purple-800 font-medium">
        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Website
      </a>
    </div>

    <div class="text-center mt-4 text-sm text-gray-500">
      <p>Default login: admin / password</p>
    </div>
  </div>

</body>
</html>
