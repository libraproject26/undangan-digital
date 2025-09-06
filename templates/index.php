<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template Gallery - Undangan Digital</title>
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
    <div class="text-center mb-12">
      <h1 class="text-5xl font-heading font-bold text-purple-600 mb-4">Template Gallery</h1>
      <p class="text-xl text-gray-600">Pilih template yang sesuai dengan tema pernikahan Anda</p>
      <div class="flex flex-wrap justify-center gap-4 mt-6">
        <div class="bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 shadow-lg">
          <i class="fas fa-palette text-purple-600 mr-2"></i>
          <span class="text-gray-700 font-medium">6 Template Unik</span>
        </div>
        <div class="bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 shadow-lg">
          <i class="fas fa-mobile-alt text-pink-600 mr-2"></i>
          <span class="text-gray-700 font-medium">Responsive Design</span>
        </div>
        <div class="bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 shadow-lg">
          <i class="fas fa-cog text-blue-600 mr-2"></i>
          <span class="text-gray-700 font-medium">Customizable</span>
        </div>
      </div>
    </div>

    <!-- Bestseller Section -->
    <div class="mb-16">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-heading font-bold text-gray-800 mb-4">
          <i class="fas fa-trophy text-yellow-500 mr-3"></i>
          Template Terlaris
        </h2>
        <p class="text-gray-600">Template yang paling banyak dipilih oleh customer kami</p>
      </div>
      
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <!-- Classic - Most Popular -->
        <div class="template-card bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 relative" data-basic="50000" data-premium="100000" data-exclusive="200000">
          <div class="absolute top-4 right-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
            #1 TERLARIS
          </div>
          <div class="h-64 bg-gradient-to-br from-amber-100 to-orange-100 flex items-center justify-center">
            <div class="text-8xl">💌</div>
          </div>
          <div class="p-8">
            <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Classic</h3>
            <p class="text-gray-600 mb-6">Desain klasik dengan sentuhan vintage yang elegan. Cocok untuk pernikahan tradisional dengan nuansa hangat dan romantis.</p>
            
            <div class="space-y-2 mb-6">
              <div class="flex justify-between">
                <span class="text-gray-500">Basic:</span>
                <span class="font-semibold">Rp 50.000</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500">Premium:</span>
                <span class="font-semibold">Rp 100.000</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500">Exclusive:</span>
                <span class="font-semibold">Rp 200.000</span>
              </div>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="flex items-center text-yellow-500 mr-2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <span class="text-gray-600 text-sm">(234 reviews)</span>
            </div>
            
            <div class="flex space-x-3">
              <a href="../invitation.php?slug=ahmad-sari" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                <i class="fas fa-eye mr-2"></i>Preview
              </a>
              <a href="../order.php?template=classic" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                <i class="fas fa-shopping-cart mr-2"></i>Order
              </a>
            </div>
          </div>
        </div>

        <!-- Minimalist - Budget Friendly -->
        <div class="template-card bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 relative" data-basic="40000" data-premium="80000" data-exclusive="150000">
          <div class="absolute top-4 right-4 bg-gradient-to-r from-green-400 to-blue-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
            BUDGET FRIENDLY
          </div>
          <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
            <div class="text-8xl">📄</div>
          </div>
          <div class="p-8">
            <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Minimalist</h3>
            <p class="text-gray-600 mb-6">Desain minimalis yang clean dan modern. Cocok untuk pernikahan dengan tema simple namun tetap elegan dan timeless.</p>
            
            <div class="space-y-2 mb-6">
              <div class="flex justify-between">
                <span class="text-gray-500">Basic:</span>
                <span class="font-semibold">Rp 40.000</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500">Premium:</span>
                <span class="font-semibold">Rp 80.000</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500">Exclusive:</span>
                <span class="font-semibold">Rp 150.000</span>
              </div>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="flex items-center text-yellow-500 mr-2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <span class="text-gray-600 text-sm">(189 reviews)</span>
            </div>
            
            <div class="flex space-x-3">
              <a href="../invitation.php?slug=ahmad-sari-minimalist" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                <i class="fas fa-eye mr-2"></i>Preview
              </a>
              <a href="../order.php?template=minimalist" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                <i class="fas fa-shopping-cart mr-2"></i>Order
              </a>
            </div>
          </div>
        </div>

        <!-- Luxury - Premium -->
        <div class="template-card bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 relative" data-basic="100000" data-premium="150000" data-exclusive="300000">
          <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
            PREMIUM
          </div>
          <div class="h-64 bg-gradient-to-br from-yellow-100 to-amber-100 flex items-center justify-center">
            <div class="text-8xl">👑</div>
          </div>
          <div class="p-8">
            <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Luxury</h3>
            <p class="text-gray-600 mb-6">Desain mewah dengan aksen emas dan detail premium. Cocok untuk pernikahan eksklusif dengan nuansa glamour dan kemewahan.</p>
            
            <div class="space-y-2 mb-6">
              <div class="flex justify-between">
                <span class="text-gray-500">Basic:</span>
                <span class="font-semibold">Rp 100.000</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500">Premium:</span>
                <span class="font-semibold">Rp 150.000</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500">Exclusive:</span>
                <span class="font-semibold">Rp 300.000</span>
              </div>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="flex items-center text-yellow-500 mr-2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <span class="text-gray-600 text-sm">(156 reviews)</span>
            </div>
            
            <div class="flex space-x-3">
              <a href="../invitation.php?slug=rizky-diana-luxury" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                <i class="fas fa-eye mr-2"></i>Preview
              </a>
              <a href="../order.php?template=luxury" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                <i class="fas fa-shopping-cart mr-2"></i>Order
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Package Categories -->
    <div class="mb-12">
      <h2 class="text-3xl font-heading font-bold text-center text-gray-800 mb-8">Pilih Berdasarkan Kategori Paket</h2>
      
      <div class="grid md:grid-cols-3 gap-6 mb-8">
        <!-- Basic Package -->
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition duration-300">
          <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-seedling text-green-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-heading font-bold text-gray-800 mb-2">Paket Basic</h3>
          <p class="text-gray-600 mb-4">Template sederhana dengan fitur standar</p>
          <div class="text-2xl font-bold text-green-600 mb-2">Rp 40.000 - 100.000</div>
          <p class="text-sm text-gray-500">Cocok untuk budget terbatas</p>
        </div>

        <!-- Premium Package -->
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition duration-300">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-star text-blue-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-heading font-bold text-gray-800 mb-2">Paket Premium</h3>
          <p class="text-gray-600 mb-4">Template dengan fitur lengkap dan desain menarik</p>
          <div class="text-2xl font-bold text-blue-600 mb-2">Rp 80.000 - 150.000</div>
          <p class="text-sm text-gray-500">Pilihan terpopuler</p>
        </div>

        <!-- Exclusive Package -->
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition duration-300">
          <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-crown text-purple-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-heading font-bold text-gray-800 mb-2">Paket Exclusive</h3>
          <p class="text-gray-600 mb-4">Template mewah dengan fitur premium dan customisasi</p>
          <div class="text-2xl font-bold text-purple-600 mb-2">Rp 150.000 - 300.000</div>
          <p class="text-sm text-gray-500">Untuk acara istimewa</p>
        </div>
      </div>
    </div>

    <!-- Filter Section -->
    <div class="mb-8">
      <div class="bg-white rounded-2xl shadow-lg p-6">
        <h3 class="text-xl font-heading font-bold text-gray-800 mb-4">Filter Template</h3>
        <div class="flex flex-wrap gap-4">
          <button onclick="filterTemplates('all')" class="filter-btn active bg-purple-600 text-white px-6 py-2 rounded-full font-medium hover:bg-purple-700 transition">
            Semua Template
          </button>
          <button onclick="filterTemplates('basic')" class="filter-btn bg-green-100 text-green-700 px-6 py-2 rounded-full font-medium hover:bg-green-200 transition">
            Paket Basic
          </button>
          <button onclick="filterTemplates('premium')" class="filter-btn bg-blue-100 text-blue-700 px-6 py-2 rounded-full font-medium hover:bg-blue-200 transition">
            Paket Premium
          </button>
          <button onclick="filterTemplates('exclusive')" class="filter-btn bg-purple-100 text-purple-700 px-6 py-2 rounded-full font-medium hover:bg-purple-200 transition">
            Paket Exclusive
          </button>
        </div>
      </div>
    </div>

    <!-- Templates Grid -->
    <div id="templates-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
      
      <!-- Classic Template -->
      <div class="template-card bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300" data-basic="50000" data-premium="100000" data-exclusive="200000">
        <div class="h-64 bg-gradient-to-br from-amber-100 to-orange-100 flex items-center justify-center">
          <div class="text-8xl">💌</div>
        </div>
        <div class="p-8">
          <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Classic</h3>
          <p class="text-gray-600 mb-6">Desain klasik dengan sentuhan vintage yang elegan. Cocok untuk pernikahan tradisional dengan nuansa hangat dan romantis.</p>
          
          <div class="space-y-2 mb-6">
            <div class="flex justify-between">
              <span class="text-gray-500">Basic:</span>
              <span class="font-semibold">Rp 50.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Premium:</span>
              <span class="font-semibold">Rp 100.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Exclusive:</span>
              <span class="font-semibold">Rp 200.000</span>
            </div>
          </div>
          
          <div class="flex space-x-3">
            <a href="../invitation.php?slug=ahmad-sari" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-eye mr-2"></i>Preview
            </a>
            <a href="../order.php?template=classic" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-shopping-cart mr-2"></i>Order
            </a>
          </div>
        </div>
      </div>

      <!-- Modern Template -->
      <div class="template-card bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300" data-basic="75000" data-premium="125000" data-exclusive="250000">
        <div class="h-64 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
          <div class="text-8xl">💍</div>
        </div>
        <div class="p-8">
          <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Modern</h3>
          <p class="text-gray-600 mb-6">Desain modern minimalis dengan tipografi yang stylish. Cocok untuk pernikahan kontemporer dengan nuansa fresh dan elegan.</p>
          
          <div class="space-y-2 mb-6">
            <div class="flex justify-between">
              <span class="text-gray-500">Basic:</span>
              <span class="font-semibold">Rp 50.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Premium:</span>
              <span class="font-semibold">Rp 100.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Exclusive:</span>
              <span class="font-semibold">Rp 200.000</span>
            </div>
          </div>
          
          <div class="flex space-x-3">
            <a href="../invitation.php?slug=rizky-diana" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-eye mr-2"></i>Preview
            </a>
            <a href="../order.php?template=modern" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-shopping-cart mr-2"></i>Order
            </a>
          </div>
        </div>
      </div>

      <!-- Luxury Template -->
      <div class="template-card bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300" data-basic="100000" data-premium="150000" data-exclusive="300000">
        <div class="h-64 bg-gradient-to-br from-yellow-100 to-amber-100 flex items-center justify-center">
          <div class="text-8xl">👑</div>
        </div>
        <div class="p-8">
          <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Luxury</h3>
          <p class="text-gray-600 mb-6">Desain mewah dengan aksen emas dan detail premium. Cocok untuk pernikahan eksklusif dengan nuansa glamour dan kemewahan.</p>
          
          <div class="space-y-2 mb-6">
            <div class="flex justify-between">
              <span class="text-gray-500">Basic:</span>
              <span class="font-semibold">Rp 50.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Premium:</span>
              <span class="font-semibold">Rp 100.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Exclusive:</span>
              <span class="font-semibold">Rp 200.000</span>
            </div>
          </div>
          
          <div class="flex space-x-3">
            <a href="../invitation.php?slug=rizky-diana-luxury" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-eye mr-2"></i>Preview
            </a>
            <a href="../order.php?template=luxury" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-shopping-cart mr-2"></i>Order
            </a>
          </div>
        </div>
      </div>

      <!-- Elegant Template -->
      <div class="template-card bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300" data-basic="75000" data-premium="125000" data-exclusive="250000">
        <div class="h-64 bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
          <div class="text-8xl">✨</div>
        </div>
        <div class="p-8">
          <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Elegant</h3>
          <p class="text-gray-600 mb-6">Desain elegan dengan gradien warna yang memukau. Cocok untuk pernikahan modern dengan nuansa romantis dan sophisticated.</p>
          
          <div class="space-y-2 mb-6">
            <div class="flex justify-between">
              <span class="text-gray-500">Basic:</span>
              <span class="font-semibold">Rp 75.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Premium:</span>
              <span class="font-semibold">Rp 125.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Exclusive:</span>
              <span class="font-semibold">Rp 250.000</span>
            </div>
          </div>
          
          <div class="flex space-x-3">
            <a href="../invitation.php?slug=ahmad-sari-elegant" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-eye mr-2"></i>Preview
            </a>
            <a href="../order.php?template=elegant" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-shopping-cart mr-2"></i>Order
            </a>
          </div>
        </div>
      </div>

      <!-- Minimalist Template -->
      <div class="template-card bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300" data-basic="40000" data-premium="80000" data-exclusive="150000">
        <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
          <div class="text-8xl">📄</div>
        </div>
        <div class="p-8">
          <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Minimalist</h3>
          <p class="text-gray-600 mb-6">Desain minimalis yang clean dan modern. Cocok untuk pernikahan dengan tema simple namun tetap elegan dan timeless.</p>
          
          <div class="space-y-2 mb-6">
            <div class="flex justify-between">
              <span class="text-gray-500">Basic:</span>
              <span class="font-semibold">Rp 40.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Premium:</span>
              <span class="font-semibold">Rp 80.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Exclusive:</span>
              <span class="font-semibold">Rp 150.000</span>
            </div>
          </div>
          
          <div class="flex space-x-3">
            <a href="../invitation.php?slug=ahmad-sari-minimalist" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-eye mr-2"></i>Preview
            </a>
            <a href="../order.php?template=minimalist" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-shopping-cart mr-2"></i>Order
            </a>
          </div>
        </div>
      </div>

      <!-- Vintage Template -->
      <div class="template-card bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300" data-basic="60000" data-premium="110000" data-exclusive="220000">
        <div class="h-64 bg-gradient-to-br from-amber-100 to-yellow-100 flex items-center justify-center">
          <div class="text-8xl">🏛️</div>
        </div>
        <div class="p-8">
          <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Vintage</h3>
          <p class="text-gray-600 mb-6">Desain vintage dengan sentuhan klasik yang timeless. Cocok untuk pernikahan dengan tema retro dan nuansa hangat yang memukau.</p>
          
          <div class="space-y-2 mb-6">
            <div class="flex justify-between">
              <span class="text-gray-500">Basic:</span>
              <span class="font-semibold">Rp 60.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Premium:</span>
              <span class="font-semibold">Rp 110.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-500">Exclusive:</span>
              <span class="font-semibold">Rp 220.000</span>
            </div>
          </div>
          
          <div class="flex space-x-3">
            <a href="../invitation.php?slug=ahmad-sari-vintage" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-eye mr-2"></i>Preview
            </a>
            <a href="../order.php?template=vintage" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
              <i class="fas fa-shopping-cart mr-2"></i>Order
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Features Section -->
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
      <h2 class="text-3xl font-heading font-bold text-center text-gray-800 mb-8">Mengapa Memilih Template Kami?</h2>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="text-center">
          <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-mobile-alt text-purple-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">Responsive Design</h3>
          <p class="text-gray-600">Tampilan sempurna di semua device, dari smartphone hingga desktop</p>
        </div>
        
        <div class="text-center">
          <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-palette text-pink-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">Customizable</h3>
          <p class="text-gray-600">Dapat disesuaikan dengan tema dan warna pernikahan Anda</p>
        </div>
        
        <div class="text-center">
          <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-rocket text-green-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">Fast Loading</h3>
          <p class="text-gray-600">Optimized untuk kecepatan loading yang maksimal</p>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="text-center">
      <h2 class="text-3xl font-heading font-bold text-gray-800 mb-4">Siap Memilih Template?</h2>
      <p class="text-xl text-gray-600 mb-8">Pilih template yang sesuai dan mulai buat undangan digital Anda</p>
      <a href="../order.php" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:from-pink-600 hover:to-purple-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
        <i class="fas fa-shopping-cart mr-3"></i>
        Mulai Order Sekarang
      </a>
    </div>

    <!-- Back to Home -->
    <div class="text-center mt-8">
      <a href="../index.php" class="text-purple-600 hover:text-purple-800 font-medium">
        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Halaman Utama
      </a>
    </div>
  </div>

  <script>
    function filterTemplates(category) {
      const templates = document.querySelectorAll('.template-card');
      const buttons = document.querySelectorAll('.filter-btn');
      
      // Update button states
      buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-purple-600', 'text-white');
        btn.classList.add('bg-gray-100', 'text-gray-700');
      });
      
      // Activate clicked button
      event.target.classList.add('active', 'bg-purple-600', 'text-white');
      event.target.classList.remove('bg-gray-100', 'text-gray-700');
      
      // Filter templates with animation
      templates.forEach((template, index) => {
        if (category === 'all') {
          template.style.display = 'block';
          template.style.animation = `fadeIn 0.5s ease-in-out ${index * 0.1}s both`;
        } else {
          const basicPrice = parseInt(template.dataset.basic);
          const premiumPrice = parseInt(template.dataset.premium);
          const exclusivePrice = parseInt(template.dataset.exclusive);
          
          let show = false;
          
          if (category === 'basic') {
            show = basicPrice <= 100000;
          } else if (category === 'premium') {
            show = premiumPrice >= 80000 && premiumPrice <= 150000;
          } else if (category === 'exclusive') {
            show = exclusivePrice >= 150000;
          }
          
          if (show) {
            template.style.display = 'block';
            template.style.animation = `fadeIn 0.5s ease-in-out ${index * 0.1}s both`;
          } else {
            template.style.display = 'none';
            template.style.animation = 'none';
          }
        }
      });
    }

    // Add CSS for fadeIn animation
    const style = document.createElement('style');
    style.textContent = `
      .animate-fadeIn {
        animation: fadeIn 0.5s ease-in-out;
      }
      
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }
      
      .filter-btn {
        transition: all 0.3s ease;
      }
      
      .filter-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      }
    `;
    document.head.appendChild(style);

    // Initialize with all templates visible
    document.addEventListener('DOMContentLoaded', function() {
      const templates = document.querySelectorAll('.template-card');
      templates.forEach(template => {
        template.classList.add('animate-fadeIn');
      });
    });
  </script>

</body>
</html>