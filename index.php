<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Undangan Digital - Buat Undangan Digital Elegan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="assets/image/favicon.png" type="image/png">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            heading: ['Playfair Display', 'serif'],
            body: ['Poppins', 'sans-serif'],
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-20px)' },
            }
          }
        }
      }
    }
  </script>
  <style>
    .hero-pattern {
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    
    .testimonial-card {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
    }
    
    .testimonial-card:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    html, body {
      overflow-x: hidden;
      overflow-y: auto;
    }

    .package-card {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
    }
    
    .package-card:hover {
      transform: translateY(-8px) scale(1.03);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .feature-icon {
      width: 80px;
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      border-radius: 20px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
      transition: all 0.3s ease;
    }
    
    .feature-icon:hover {
      transform: translateY(-5px) scale(1.1);
      box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
    }

    /* Animasi untuk logo */
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    
    .logo {
      animation: pulse 4s ease-in-out infinite;
    }

    /* Animasi floating yang lebih smooth */
    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      33% { transform: translateY(-20px) rotate(1deg); }
      66% { transform: translateY(-10px) rotate(-1deg); }
    }

    /* Gradient text effect */
    .gradient-text {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Glassmorphism effect */
    .glass {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Animated background */
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

    /* Parallax effect */
    .parallax {
      transform: translateZ(0);
      will-change: transform;
    }

    /* Hover effects for buttons */
    .btn-hover {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .btn-hover::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .btn-hover:hover::before {
      left: 100%;
    }

    /* Card hover effects */
    .card-hover {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    /* Loading animation */
    @keyframes shimmer {
      0% { background-position: -200px 0; }
      100% { background-position: calc(200px + 100%) 0; }
    }

    .shimmer {
      background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
      background-size: 200px 100%;
      animation: shimmer 1.5s infinite;
    }
  </style>
</head>
<body class="bg-white text-gray-800 font-body">

  <!-- Navigation -->
  <nav class="fixed w-full bg-white/90 backdrop-blur-sm z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-4">
        <div class="flex items-center">
          <span class="text-2xl font-heading font-bold text-purple-600 logo">Undangan Digital</span>
        </div>
        <div class="hidden md:flex space-x-10">
          <a href="#demo" class="text-gray-700 hover:text-purple-600 transition">Demo</a>
          <a href="catalog.php" class="text-gray-700 hover:text-purple-600 transition">E-Katalog</a>
          <a href="#features" class="text-gray-700 hover:text-purple-600 transition">Fitur</a>
          <a href="pricing.php" class="text-gray-700 hover:text-purple-600 transition">E-Katalog Harga</a>
          <a href="#testimonials" class="text-gray-700 hover:text-purple-600 transition">Testimoni</a>
        </div>
        <a href="order.php" class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-full font-medium transition shadow-md">Pesan Sekarang</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative animated-bg text-white min-h-screen flex flex-col justify-center items-center text-center">
    <!-- Animated background elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-20">
      <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full animate-float parallax"></div>
      <div class="absolute bottom-10 right-10 w-96 h-96 bg-white rounded-full animate-float parallax" style="animation-delay: 2s;"></div>
      <div class="absolute top-1/2 left-1/4 w-48 h-48 bg-yellow-300 rounded-full animate-float parallax" style="animation-delay: 4s;"></div>
      <div class="absolute bottom-1/4 left-1/3 w-64 h-64 bg-pink-300 rounded-full animate-float parallax" style="animation-delay: 6s;"></div>
    </div>
    
    <!-- Floating particles -->
    <div class="absolute inset-0 overflow-hidden">
      <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-white rounded-full animate-pulse"></div>
      <div class="absolute top-1/3 right-1/4 w-3 h-3 bg-yellow-300 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
      <div class="absolute bottom-1/3 left-1/2 w-2 h-2 bg-pink-300 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
      <div class="absolute top-2/3 right-1/3 w-4 h-4 bg-blue-300 rounded-full animate-pulse" style="animation-delay: 3s;"></div>
    </div>
    
    <div class="relative z-10 max-w-5xl mx-auto px-6">
      <div class="mb-8">
        <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium mb-6">
          ✨ Undangan Digital Terpercaya
        </span>
      </div>
      
      <h1 class="text-6xl md:text-8xl font-heading font-bold mb-6 leading-tight">
        <span class="gradient-text">Undangan</span><br>
        <span class="text-white">Digital</span>
      </h1>
      
      <p class="text-xl md:text-3xl mb-12 max-w-4xl mx-auto leading-relaxed">
        Buat momen spesialmu jadi lebih berkesan dengan undangan digital modern yang memukau dan tak terlupakan
      </p>
      
      <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
        <a href="#demo" class="group px-10 py-5 bg-white/20 backdrop-blur-sm text-white font-semibold rounded-full shadow-2xl hover:bg-white/30 transition-all duration-300 flex items-center justify-center btn-hover">
          <i class="fas fa-eye mr-3 text-xl group-hover:scale-110 transition-transform"></i> 
          Lihat Demo
        </a>
        <a href="order.php" class="group px-10 py-5 bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 font-bold rounded-full shadow-2xl hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 flex items-center justify-center btn-hover transform hover:scale-105">
          <i class="fas fa-gift mr-3 text-xl group-hover:scale-110 transition-transform"></i> 
          Order Sekarang
        </a>
      </div>
      
      <!-- Stats -->
      <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
        <div class="text-center">
          <div class="text-4xl font-bold text-white mb-2">1000+</div>
          <div class="text-white/80">Undangan Terbuat</div>
        </div>
        <div class="text-center">
          <div class="text-4xl font-bold text-white mb-2">500+</div>
          <div class="text-white/80">Pelanggan Puas</div>
        </div>
        <div class="text-center">
          <div class="text-4xl font-bold text-white mb-2">24/7</div>
          <div class="text-white/80">Support</div>
        </div>
      </div>
    </div>
    
    <div class="absolute bottom-10 animate-bounce">
      <a href="#demo" class="text-white text-4xl hover:text-yellow-300 transition-colors">
        <i class="fas fa-chevron-down"></i>
      </a>
    </div>
  </section>

  <!-- Demo Undangan -->
  <section id="demo" class="py-24 bg-gradient-to-br from-gray-50 to-blue-50 relative">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute top-20 left-20 w-32 h-32 bg-purple-500 rounded-full blur-3xl"></div>
      <div class="absolute bottom-20 right-20 w-40 h-40 bg-pink-500 rounded-full blur-3xl"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-blue-500 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
      <div class="mb-12">
        <span class="inline-block px-4 py-2 bg-purple-100 text-purple-600 rounded-full text-sm font-medium mb-4">
          🎨 Template Gallery
        </span>
        <h2 class="text-5xl font-heading font-bold mb-6 gradient-text">Contoh Undangan</h2>
        <p class="text-xl text-gray-600 mb-16 max-w-4xl mx-auto leading-relaxed">
          Lihat berbagai pilihan template digital yang dapat disesuaikan dengan tema acara Anda. 
          Setiap template dirancang khusus untuk memberikan kesan yang tak terlupakan.
        </p>
      </div>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="group card-hover rounded-3xl overflow-hidden shadow-2xl bg-white relative">
          <div class="absolute inset-0 bg-gradient-to-br from-amber-400/10 to-orange-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="h-80 overflow-hidden relative">
            <img src="./assets/image/demo-classic.png" alt="Demo Classic" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            <div class="absolute top-4 right-4">
              <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-medium text-gray-700">
                Classic
              </span>
            </div>
          </div>
          <div class="p-8 relative">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-heart text-white text-xl"></i>
              </div>
              <div>
                <h3 class="font-heading font-bold text-2xl text-gray-800">Tema Classic</h3>
                <p class="text-amber-600 font-medium">Elegant & Timeless</p>
              </div>
            </div>
            <p class="text-gray-600 mb-6 leading-relaxed">Digital floral design dengan sentuhan vintage yang elegan dan romantis</p>
            <a href="invitation.php?slug=ahmad-sari" target="_blank" class="group/btn inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-400 to-orange-500 text-white font-semibold rounded-full transition-all duration-300 hover:from-amber-500 hover:to-orange-600 hover:scale-105">
              <span>Lihat Contoh</span>
              <i class="fas fa-arrow-right ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
            </a>
          </div>
        </div>
        
        <div class="group card-hover rounded-3xl overflow-hidden shadow-2xl bg-white relative">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-400/10 to-purple-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="h-80 overflow-hidden relative">
            <img src="./assets/image/demo-modern.png" alt="Demo Modern" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            <div class="absolute top-4 right-4">
              <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-medium text-gray-700">
                Modern
              </span>
            </div>
          </div>
          <div class="p-8 relative">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-500 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-star text-white text-xl"></i>
              </div>
              <div>
                <h3 class="font-heading font-bold text-2xl text-gray-800">Tema Modern</h3>
                <p class="text-blue-600 font-medium">Sleek & Contemporary</p>
              </div>
            </div>
            <p class="text-gray-600 mb-6 leading-relaxed">Desain minimalis dengan tipografi yang stylish dan fresh</p>
            <a href="invitation.php?slug=rizky-diana" target="_blank" class="group/btn inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-400 to-purple-500 text-white font-semibold rounded-full transition-all duration-300 hover:from-blue-500 hover:to-purple-600 hover:scale-105">
              <span>Lihat Contoh</span>
              <i class="fas fa-arrow-right ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
            </a>
          </div>
        </div>
        
        <div class="group card-hover rounded-3xl overflow-hidden shadow-2xl bg-white relative">
          <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/10 to-amber-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="h-80 overflow-hidden relative">
            <img src="./assets/image/demo-luxury.png" alt="Demo Luxury" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            <div class="absolute top-4 right-4">
              <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-medium text-gray-700">
                Luxury
              </span>
            </div>
          </div>
          <div class="p-8 relative">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-crown text-white text-xl"></i>
              </div>
              <div>
                <h3 class="font-heading font-bold text-2xl text-gray-800">Tema Luxury</h3>
                <p class="text-yellow-600 font-medium">Premium & Glamorous</p>
              </div>
            </div>
            <p class="text-gray-600 mb-6 leading-relaxed">Kemewahan emas dengan detail digital yang memukau</p>
            <a href="invitation.php?slug=rizky-diana-luxury" target="_blank" class="group/btn inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-400 to-amber-500 text-white font-semibold rounded-full transition-all duration-300 hover:from-yellow-500 hover:to-amber-600 hover:scale-105">
              <span>Lihat Contoh</span>
              <i class="fas fa-arrow-right ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
            </a>
          </div>
        </div>
      </div>
      
      <div class="mt-16">
        <a href="templates/" class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full transition-all duration-300 hover:from-purple-700 hover:to-pink-700 hover:scale-105 shadow-2xl">
          <i class="fas fa-palette mr-3 text-xl group-hover:rotate-12 transition-transform"></i>
          <span>Lihat Semua Template</span>
          <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Keunggulan -->
  <section id="features" class="py-24 bg-white relative">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute top-10 left-10 w-40 h-40 bg-purple-500 rounded-full blur-3xl"></div>
      <div class="absolute bottom-10 right-10 w-60 h-60 bg-pink-500 rounded-full blur-3xl"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
      <div class="mb-16">
        <span class="inline-block px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-600 rounded-full text-sm font-medium mb-4">
          ✨ Keunggulan Kami
        </span>
        <h2 class="text-5xl font-heading font-bold mb-6 gradient-text">Kenapa Pilih Undangan Digital?</h2>
        <p class="text-xl text-gray-600 mb-16 max-w-4xl mx-auto leading-relaxed">
          Kami memberikan pengalaman terbaik untuk undangan digital Anda dengan teknologi terkini dan desain yang memukau
        </p>
      </div>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-pink-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="relative z-10">
            <div class="feature-icon bg-gradient-to-br from-pink-500 to-purple-600 text-white rounded-2xl text-3xl mb-6">
            <i class="fas fa-coins"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl mb-4 text-gray-800">Hemat Biaya</h3>
            <p class="text-gray-600 leading-relaxed">Tidak perlu cetak ribuan undangan, cukup sekali klik bisa dibagikan ke siapa saja. Hemat hingga 80% dari biaya undangan konvensional.</p>
          </div>
        </div>
        
        <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="relative z-10">
            <div class="feature-icon bg-gradient-to-br from-blue-500 to-purple-600 text-white rounded-2xl text-3xl mb-6">
            <i class="fas fa-paint-brush"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl mb-4 text-gray-800">Desain Digital</h3>
            <p class="text-gray-600 leading-relaxed">Koleksi template premium yang bisa disesuaikan sesuai tema acara. Desain modern dan elegan yang tak akan ketinggalan zaman.</p>
          </div>
        </div>
        
        <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/5 to-orange-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="relative z-10">
            <div class="feature-icon bg-gradient-to-br from-yellow-500 to-orange-600 text-white rounded-2xl text-3xl mb-6">
            <i class="fas fa-bolt"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl mb-4 text-gray-800">Cepat & Praktis</h3>
            <p class="text-gray-600 leading-relaxed">Undangan siap dalam hitungan menit, tanpa ribet. Proses yang mudah dan cepat untuk acara yang mendesak.</p>
          </div>
        </div>
      </div>
      
      <div class="grid md:grid-cols-3 gap-8 mt-8">
        <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="relative z-10">
            <div class="feature-icon bg-gradient-to-br from-green-500 to-emerald-600 text-white rounded-2xl text-3xl mb-6">
            <i class="fas fa-heart"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl mb-4 text-gray-800">Ramah Lingkungan</h3>
            <p class="text-gray-600 leading-relaxed">Kurangi penggunaan kertas dan berkontribusi untuk kelestarian lingkungan. Pilihan yang bijak untuk masa depan.</p>
          </div>
        </div>
        
        <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="relative z-10">
            <div class="feature-icon bg-gradient-to-br from-blue-500 to-cyan-600 text-white rounded-2xl text-3xl mb-6">
            <i class="fas fa-chart-line"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl mb-4 text-gray-800">Tracking Tamu</h3>
            <p class="text-gray-600 leading-relaxed">Pantau siapa saja yang telah membuka dan konfirmasi kehadiran. Dashboard lengkap untuk manajemen tamu.</p>
          </div>
        </div>
        
        <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-red-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="relative z-10">
            <div class="feature-icon bg-gradient-to-br from-red-500 to-pink-600 text-white rounded-2xl text-3xl mb-6">
            <i class="fas fa-music"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl mb-4 text-gray-800">Fitur Interaktif</h3>
            <p class="text-gray-600 leading-relaxed">Tambahkan musik, galeri foto, dan map lokasi untuk pengalaman lebih. Undangan yang hidup dan berkesan.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section id="testimonials" class="py-24 bg-gradient-to-br from-gray-50 to-purple-50 relative">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute top-20 left-20 w-40 h-40 bg-purple-500 rounded-full blur-3xl"></div>
      <div class="absolute bottom-20 right-20 w-60 h-60 bg-pink-500 rounded-full blur-3xl"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
      <div class="mb-16">
        <span class="inline-block px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-600 rounded-full text-sm font-medium mb-4">
          💬 Testimoni Pelanggan
        </span>
        <h2 class="text-5xl font-heading font-bold mb-6 gradient-text">Apa Kata Pelanggan Kami?</h2>
        <p class="text-xl text-gray-600 mb-16 max-w-4xl mx-auto leading-relaxed">
          Ribuan orang telah mempercayai undangan digital mereka pada kami. Dengarkan pengalaman mereka yang luar biasa.
        </p>
      </div>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="testimonial-card p-8 bg-white rounded-3xl shadow-xl relative overflow-hidden group">
          <div class="absolute inset-0 bg-gradient-to-br from-pink-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="relative z-10">
          <div class="flex justify-center mb-6">
              <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gradient-to-r from-pink-400 to-purple-500 relative">
                <img src="https://i.pinimg.com/736x/71/a8/60/71a860ec21f578472f6be8d08b709f67.jpg" alt="Customer" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-br from-pink-400/20 to-purple-500/20"></div>
              </div>
            </div>
            <h3 class="font-bold text-xl mb-2 text-gray-800">Diana Putri</h3>
            <p class="text-sm text-gray-500 mb-4">Bride, Jakarta</p>
            <div class="text-yellow-400 mb-6 text-xl">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
            <p class="text-gray-600 leading-relaxed italic">"Undangan digitalnya sangat elegan! Semua tamu kami memuji dan proses pembuatannya sangat cepat. Terima kasih telah membuat hari spesial kami semakin berkesan!"</p>
          </div>
        </div>
        
        <div class="testimonial-card p-8 bg-white rounded-3xl shadow-xl relative overflow-hidden group">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="relative z-10">
          <div class="flex justify-center mb-6">
              <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gradient-to-r from-blue-400 to-purple-500 relative">
                <img src="https://i.pinimg.com/736x/0f/da/9f/0fda9f27627f65764fb316e1958a934c.jpg" alt="Customer" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-400/20 to-purple-500/20"></div>
              </div>
            </div>
            <h3 class="font-bold text-xl mb-2 text-gray-800">Rizky Ahmad</h3>
            <p class="text-sm text-gray-500 mb-4">Groom, Bandung</p>
            <div class="text-yellow-400 mb-6 text-xl">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
            <p class="text-gray-600 leading-relaxed italic">"Template-nya sangat customizable, bisa menyesuaikan dengan tema pernikahan kami. Highly recommended! Pelayanan customer service-nya juga sangat memuaskan."</p>
          </div>
        </div>
        
        <div class="testimonial-card p-8 bg-white rounded-3xl shadow-xl relative overflow-hidden group">
          <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div class="relative z-10">
          <div class="flex justify-center mb-6">
              <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gradient-to-r from-green-400 to-blue-500 relative">
                <img src="https://res.cloudinary.com/dzgxqfnv9/image/upload/v1757086921/imgtourl/ChatGPT_Image_24_Agu_2025_10.17.34_qfjhue.png" alt="Customer" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-br from-green-400/20 to-blue-500/20"></div>
              </div>
            </div>
            <h3 class="font-bold text-xl mb-2 text-gray-800">Aisyah</h3>
            <p class="text-sm text-gray-500 mb-4">Bride, Surabaya</p>
            <div class="text-yellow-400 mb-6 text-xl">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
            <p class="text-gray-600 leading-relaxed italic">"Fitur RSVP-nya sangat membantu untuk tracking tamu yang datang. Support timnya juga responsif banget! Sangat puas dengan hasilnya."</p>
          </div>
        </div>
      </div>
      
      <!-- Trust indicators -->
      <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
        <div class="text-center">
          <div class="text-3xl font-bold text-purple-600 mb-2">1000+</div>
          <div class="text-gray-600">Undangan Terbuat</div>
        </div>
        <div class="text-center">
          <div class="text-3xl font-bold text-pink-600 mb-2">500+</div>
          <div class="text-gray-600">Pelanggan Puas</div>
        </div>
        <div class="text-center">
          <div class="text-3xl font-bold text-blue-600 mb-2">4.9/5</div>
          <div class="text-gray-600">Rating Pelanggan</div>
        </div>
        <div class="text-center">
          <div class="text-3xl font-bold text-green-600 mb-2">24/7</div>
          <div class="text-gray-600">Support</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Harga -->
  <section id="pricing" class="py-24 bg-gradient-to-br from-purple-50 to-pink-50 relative">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute top-20 left-20 w-40 h-40 bg-purple-500 rounded-full blur-3xl"></div>
      <div class="absolute bottom-20 right-20 w-60 h-60 bg-pink-500 rounded-full blur-3xl"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
      <div class="mb-16">
        <span class="inline-block px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-600 rounded-full text-sm font-medium mb-4">
          💰 Paket Harga
        </span>
        <h2 class="text-5xl font-heading font-bold mb-6 gradient-text">Paket Harga</h2>
        <p class="text-xl text-gray-600 mb-8 max-w-4xl mx-auto leading-relaxed">
          Pilih paket yang sesuai dengan kebutuhan Anda. Semua paket sudah termasuk hosting dan maintenance.
        </p>
        <div class="mb-16">
          <a href="pricing.php" class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full shadow-2xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 hover:scale-105">
            <i class="fas fa-list mr-3 text-xl group-hover:rotate-12 transition-transform"></i>
            Lihat E-Katalog Harga Lengkap
            <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
          </a>
        </div>
      </div>
      
      <div class="grid md:grid-cols-3 gap-8">
        <!-- Basic Package -->
        <div class="package-card relative bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 group">
          <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-gray-600 to-gray-800 text-white px-6 py-2 rounded-full text-sm font-medium">
            Basic
          </div>
          <div class="pt-4">
            <div class="text-center mb-8">
              <h3 class="font-heading font-bold text-3xl mb-4 text-gray-800">Paket Basic</h3>
            <div class="mb-6">
                <span class="text-5xl font-bold text-gray-800">Rp50K</span>
                <span class="text-gray-600 text-lg">/undangan</span>
              </div>
              <p class="text-gray-600">Cocok untuk acara sederhana</p>
            </div>
            
            <ul class="text-left space-y-4 mb-8">
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">1 template standar pilihan</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Custom nama & tanggal</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Masa aktif 3 bulan</span>
              </li>
              <li class="flex items-center text-gray-400">
                <i class="fas fa-times mr-3 text-lg"></i>
                <span>Tanpa musik & animasi</span>
              </li>
              <li class="flex items-center text-gray-400">
                <i class="fas fa-times mr-3 text-lg"></i>
                <span>Tanpa fitur RSVP</span>
              </li>
            </ul>
            
            <a href="order.php?package=basic" class="group/btn block w-full py-4 bg-gradient-to-r from-gray-600 to-gray-800 hover:from-gray-700 hover:to-gray-900 text-white font-semibold rounded-xl transition-all duration-300 hover:scale-105">
              <span class="flex items-center justify-center">
                Pilih Paket
                <i class="fas fa-arrow-right ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
              </span>
            </a>
          </div>
        </div>
        
        <!-- Premium Package -->
        <div class="package-card relative bg-white rounded-3xl shadow-2xl p-8 border-4 border-yellow-400 transform scale-105 group">
          <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-6 py-2 rounded-full text-sm font-medium">
            Popular
          </div>
          <div class="pt-4">
            <div class="text-center mb-8">
              <h3 class="font-heading font-bold text-3xl mb-4 text-gray-800">Paket Premium</h3>
            <div class="mb-6">
                <span class="text-5xl font-bold text-gray-800">Rp100K</span>
                <span class="text-gray-600 text-lg">/undangan</span>
              </div>
              <p class="text-gray-600">Paling populer & lengkap</p>
            </div>
            
            <ul class="text-left space-y-4 mb-8">
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Template premium pilihan</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Custom lengkap (nama, tanggal, dll)</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Musik latar & animasi digital</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Fitur RSVP & konfirmasi tamu</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Galeri foto (max 5 foto)</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Masa aktif 6 bulan</span>
              </li>
            </ul>
            
            <a href="order.php?package=premium" class="group/btn block w-full py-4 bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-gray-900 font-semibold rounded-xl transition-all duration-300 hover:scale-105">
              <span class="flex items-center justify-center">
                Pilih Paket
                <i class="fas fa-arrow-right ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
              </span>
            </a>
          </div>
        </div>
        
        <!-- Exclusive Package -->
        <div class="package-card relative bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 group">
          <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-2 rounded-full text-sm font-medium">
            Exclusive
          </div>
          <div class="pt-4">
            <div class="text-center mb-8">
              <h3 class="font-heading font-bold text-3xl mb-4 text-gray-800">Paket Exclusive</h3>
            <div class="mb-6">
                <span class="text-5xl font-bold text-gray-800">Rp200K</span>
                <span class="text-gray-600 text-lg">/undangan</span>
              </div>
              <p class="text-gray-600">Untuk acara mewah & eksklusif</p>
            </div>
            
            <ul class="text-left space-y-4 mb-8">
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Custom desain full sesuai keinginan</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Semua fitur premium</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Galeri foto unlimited</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Countdown timer</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Google Maps integration</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Masa aktif 1 tahun</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                <span class="text-gray-700">Revisi desain 3x</span>
              </li>
            </ul>
            
            <a href="order.php?package=exclusive" class="group/btn block w-full py-4 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold rounded-xl transition-all duration-300 hover:scale-105">
              <span class="flex items-center justify-center">
                Pilih Paket
                <i class="fas fa-arrow-right ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      
      <div class="mt-16 bg-white rounded-3xl shadow-2xl p-8 max-w-4xl mx-auto border border-gray-100">
        <div class="text-center">
          <h3 class="font-heading font-bold text-3xl mb-4 text-gray-800">Butuh Penyesuaian Khusus?</h3>
          <p class="text-gray-600 mb-8 text-lg leading-relaxed">Jika Anda membutuhkan penyesuaian khusus di luar paket yang tersedia, jangan ragu untuk berkonsultasi dengan kami</p>
          <a href="https://wa.me/628123456789?text=Saya%20ingin%20konsultasi%20tentang%20undangan%20digital" class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-gray-800 to-gray-900 hover:from-gray-900 hover:to-black text-white font-semibold rounded-full transition-all duration-300 hover:scale-105 shadow-xl">
            <i class="fas fa-comments mr-3 text-xl group-hover:scale-110 transition-transform"></i>
          Konsultasi Gratis
            <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
        </a>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50 relative">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute top-20 left-20 w-40 h-40 bg-purple-500 rounded-full blur-3xl"></div>
      <div class="absolute bottom-20 right-20 w-60 h-60 bg-pink-500 rounded-full blur-3xl"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-4xl mx-auto px-6 relative z-10">
      <div class="text-center mb-16">
        <span class="inline-block px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-600 rounded-full text-sm font-medium mb-4">
          ❓ FAQ
        </span>
        <h2 class="text-5xl font-heading font-bold mb-6 gradient-text">Pertanyaan Umum</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
          Temukan jawaban untuk pertanyaan yang sering diajukan tentang layanan undangan digital kami
        </p>
      </div>
      
      <div class="space-y-6">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden group">
          <button class="flex justify-between items-center w-full text-left p-8 font-semibold text-lg text-gray-800 hover:text-purple-600 transition-colors">
            <span>Berapa lama proses pengerjaan undangan digital?</span>
            <i class="fas fa-chevron-down text-purple-600 group-hover:rotate-180 transition-transform duration-300"></i>
          </button>
          <div class="px-8 pb-8 text-gray-600 leading-relaxed overflow-hidden transition-all duration-300" style="max-height: 0; padding-top: 0; padding-bottom: 0;">
            Untuk paket Basic dan Premium, undangan akan siap dalam 1-3 jam setelah konfirmasi pembayaran. Untuk paket Exclusive, proses pengerjaan membutuhkan waktu 2-3 hari tergantung kompleksitas desain.
          </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden group">
          <button class="flex justify-between items-center w-full text-left p-8 font-semibold text-lg text-gray-800 hover:text-purple-600 transition-colors">
            <span>Bagaimana cara membagikan undangan digital?</span>
            <i class="fas fa-chevron-down text-purple-600 group-hover:rotate-180 transition-transform duration-300"></i>
          </button>
          <div class="px-8 pb-8 text-gray-600 leading-relaxed overflow-hidden transition-all duration-300" style="max-height: 0; padding-top: 0; padding-bottom: 0;">
            Anda akan mendapatkan link unik yang dapat dibagikan melalui WhatsApp, email, media sosial, atau pesan teks. Anda juga bisa mengunduh versi PDF jika diperlukan.
          </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden group">
          <button class="flex justify-between items-center w-full text-left p-8 font-semibold text-lg text-gray-800 hover:text-purple-600 transition-colors">
            <span>Apakah bisa request template khusus?</span>
            <i class="fas fa-chevron-down text-purple-600 group-hover:rotate-180 transition-transform duration-300"></i>
          </button>
          <div class="px-8 pb-8 text-gray-600 leading-relaxed overflow-hidden transition-all duration-300" style="max-height: 0; padding-top: 0; padding-bottom: 0;">
            Ya, untuk paket Exclusive Anda bisa request desain custom sesuai keinginan. Untuk paket lainnya, Anda bisa memilih dari template yang sudah tersedia.
          </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden group">
          <button class="flex justify-between items-center w-full text-left p-8 font-semibold text-lg text-gray-800 hover:text-purple-600 transition-colors">
            <span>Metode pembayaran apa saja yang diterima?</span>
            <i class="fas fa-chevron-down text-purple-600 group-hover:rotate-180 transition-transform duration-300"></i>
          </button>
          <div class="px-8 pb-8 text-gray-600 leading-relaxed overflow-hidden transition-all duration-300" style="max-height: 0; padding-top: 0; padding-bottom: 0;">
            Kami menerima transfer bank, e-wallet (GoPay, OVO, Dana), serta QRIS. Pembayaran dilakukan di awal sebelum pengerjaan dimulai.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section id="order" class="py-24 animated-bg text-white relative">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-20">
      <div class="absolute top-20 left-20 w-40 h-40 bg-white rounded-full blur-3xl"></div>
      <div class="absolute bottom-20 right-20 w-60 h-60 bg-white rounded-full blur-3xl"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-white rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
      <div class="mb-12">
        <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium mb-6">
          🎉 Siap Memulai?
        </span>
        <h2 class="text-6xl font-heading font-bold mb-8 leading-tight">
          Siap Membuat Undangan<br>
          <span class="gradient-text">Digital Anda?</span>
        </h2>
        <p class="text-xl md:text-2xl mb-12 max-w-4xl mx-auto leading-relaxed">
          Jangan tunggu lagi, buat undangan digital yang memukau untuk acara spesial Anda. 
          Proses mudah, hasil memuaskan!
        </p>
      </div>
      
      <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
        <a href="order.php" class="group px-12 py-6 bg-white/20 backdrop-blur-sm text-white font-bold rounded-full shadow-2xl hover:bg-white/30 transition-all duration-300 flex items-center justify-center btn-hover transform hover:scale-105">
          <i class="fab fa-whatsapp mr-4 text-2xl group-hover:scale-110 transition-transform"></i> 
          Order via WhatsApp
        </a>
        <a href="#pricing" class="group px-12 py-6 bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 font-bold rounded-full shadow-2xl hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 flex items-center justify-center btn-hover transform hover:scale-105">
          <i class="fas fa-gift mr-4 text-2xl group-hover:scale-110 transition-transform"></i> 
          Lihat Paket Lainnya
        </a>
      </div>
      
      <!-- Trust indicators -->
      <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
        <div class="text-center">
          <div class="text-3xl font-bold text-white mb-2">1000+</div>
          <div class="text-white/80">Undangan Terbuat</div>
        </div>
        <div class="text-center">
          <div class="text-3xl font-bold text-white mb-2">500+</div>
          <div class="text-white/80">Pelanggan Puas</div>
        </div>
        <div class="text-center">
          <div class="text-3xl font-bold text-white mb-2">4.9/5</div>
          <div class="text-white/80">Rating Pelanggan</div>
        </div>
        <div class="text-center">
          <div class="text-3xl font-bold text-white mb-2">24/7</div>
          <div class="text-white/80">Support</div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Footer -->
  <footer class="bg-gradient-to-br from-gray-900 to-black text-white py-16 relative">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-20 left-20 w-40 h-40 bg-purple-500 rounded-full blur-3xl"></div>
      <div class="absolute bottom-20 right-20 w-60 h-60 bg-pink-500 rounded-full blur-3xl"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
      <div class="grid md:grid-cols-4 gap-8 mb-12">
        <div class="md:col-span-1">
          <div class="mb-6">
            <h3 class="text-3xl font-heading font-bold mb-4 gradient-text">Undangan Digital</h3>
            <p class="text-gray-400 leading-relaxed">Membuat momen spesial Anda semakin berkesan dengan undangan digital elegan dan modern.</p>
          </div>
          <div class="flex space-x-4">
            <a href="#" class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 flex items-center justify-center text-white hover:scale-110 transition-transform">
              <i class="fab fa-instagram text-xl"></i>
            </a>
            <a href="#" class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-600 to-blue-800 flex items-center justify-center text-white hover:scale-110 transition-transform">
              <i class="fab fa-facebook-f text-xl"></i>
            </a>
            <a href="#" class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center text-white hover:scale-110 transition-transform">
              <i class="fab fa-twitter text-xl"></i>
            </a>
            <a href="#" class="w-12 h-12 rounded-full bg-gradient-to-r from-red-500 to-red-700 flex items-center justify-center text-white hover:scale-110 transition-transform">
              <i class="fab fa-youtube text-xl"></i>
            </a>
          </div>
        </div>
        
        <div>
          <h4 class="text-xl font-semibold mb-6 text-white">Tautan Cepat</h4>
          <ul class="space-y-3">
            <li><a href="#demo" class="text-gray-400 hover:text-purple-400 transition-colors flex items-center group">
              <i class="fas fa-arrow-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>
              Demo
            </a></li>
            <li><a href="#features" class="text-gray-400 hover:text-purple-400 transition-colors flex items-center group">
              <i class="fas fa-arrow-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>
              Fitur
            </a></li>
            <li><a href="#pricing" class="text-gray-400 hover:text-purple-400 transition-colors flex items-center group">
              <i class="fas fa-arrow-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>
              Harga
            </a></li>
            <li><a href="#testimonials" class="text-gray-400 hover:text-purple-400 transition-colors flex items-center group">
              <i class="fas fa-arrow-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>
              Testimoni
            </a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="text-xl font-semibold mb-6 text-white">Kontak Kami</h4>
          <ul class="space-y-4">
            <li class="flex items-center group">
              <div class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center mr-4 group-hover:bg-green-500/30 transition-colors">
                <i class="fab fa-whatsapp text-green-400 text-lg"></i>
              </div>
              <span class="text-gray-400 group-hover:text-white transition-colors">+84 56 318 5476</span>
            </li>
            <li class="flex items-center group">
              <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center mr-4 group-hover:bg-blue-500/30 transition-colors">
                <i class="fas fa-envelope text-blue-400 text-lg"></i>
              </div>
              <span class="text-gray-400 group-hover:text-white transition-colors">undigi@gmail.com</span>
            </li>
            <li class="flex items-center group">
              <div class="w-10 h-10 rounded-full bg-red-500/20 flex items-center justify-center mr-4 group-hover:bg-red-500/30 transition-colors">
                <i class="fas fa-map-marker-alt text-red-400 text-lg"></i>
              </div>
              <span class="text-gray-400 group-hover:text-white transition-colors">Kota Jambi, Indonesia</span>
            </li>
          </ul>
        </div>
        
        <div>
          <h4 class="text-xl font-semibold mb-6 text-white">Newsletter</h4>
          <p class="text-gray-400 mb-4">Dapatkan update terbaru tentang template dan fitur baru</p>
          <div class="flex">
            <input type="email" placeholder="Email Anda" class="flex-1 px-4 py-3 bg-gray-800 border border-gray-700 rounded-l-lg focus:outline-none focus:border-purple-500 text-white placeholder-gray-400">
            <button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-r-lg hover:from-purple-700 hover:to-pink-700 transition-all duration-300">
              <i class="fas fa-paper-plane"></i>
            </button>
          </div>
        </div>
      </div>
      
      <div class="border-t border-gray-800 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="text-gray-400 mb-4 md:mb-0">
            <p>&copy; 2025 Undangan Digital. All rights reserved.</p>
          </div>
          <div class="flex space-x-6 text-sm">
            <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">Cookie Policy</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-6 right-6 w-14 h-14 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-2xl flex items-center justify-center transition-all duration-300 opacity-0 invisible hover:scale-110 hover:shadow-3xl group">
    <i class="fas fa-chevron-up text-lg group-hover:-translate-y-1 transition-transform"></i>
  </button>

  <script>
    // Back to top button
    const backToTopButton = document.getElementById('backToTop');
    
    window.addEventListener('scroll', () => {
      if (window.pageYOffset > 300) {
        backToTopButton.classList.remove('opacity-0', 'invisible');
        backToTopButton.classList.add('opacity-100', 'visible');
      } else {
        backToTopButton.classList.remove('opacity-100', 'visible');
        backToTopButton.classList.add('opacity-0', 'invisible');
      }
    });
    
    backToTopButton.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // FAQ toggle
    document.querySelectorAll('.bg-white.rounded-2xl button').forEach(button => {
      button.addEventListener('click', () => {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');
        
        // Toggle content visibility
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
          content.style.paddingTop = '0';
          content.style.paddingBottom = '0';
        } else {
          content.style.maxHeight = content.scrollHeight + 'px';
          content.style.paddingTop = '2rem';
          content.style.paddingBottom = '2rem';
        }
        
        // Toggle icon rotation
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
      });
    });
  </script>
</body>
</html>