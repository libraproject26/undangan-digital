<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Katalog Harga - Undangan Digital</title>
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
            'fade-in': 'fadeIn 0.8s ease-out forwards',
            'slide-up': 'slideUp 0.6s ease-out forwards',
            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            'bounce-slow': 'bounce 2s infinite',
            'float': 'float 3s ease-in-out infinite',
            'shimmer': 'shimmer 2s linear infinite',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(20px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
            slideUp: {
              '0%': { transform: 'translateY(30px)', opacity: '0' },
              '100%': { transform: 'translateY(0)', opacity: '1' },
            },
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-10px)' },
            },
            shimmer: {
              '0%': { transform: 'translateX(-100%)' },
              '100%': { transform: 'translateX(100%)' },
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
    
    .glassmorphism {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
    }
    
    .card-hover {
      transition: all 0.3s ease;
    }
    
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .btn-hover {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .btn-hover:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
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
    
    .pricing-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
    }
    
    .pricing-card-premium {
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      color: white;
    }
    
    .pricing-card-exclusive {
      background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      color: white;
    }
    
    .animated-bg {
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
    }
    
    @keyframes gradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    
    html, body {
      overflow-x: hidden;
      overflow-y: auto;
    }

    .shimmer {
      position: relative;
      overflow: hidden;
    }
    
    .shimmer::after {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
      transform: translateX(-100%);
      animation: shimmer 2s infinite;
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
  
  <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 py-12 relative z-10">
    <!-- Header -->
    <div class="text-center mb-16 animate-fade-in">
      <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mb-6">
        <i class="fas fa-tags text-white text-3xl"></i>
      </div>
      <h1 class="text-6xl font-heading font-bold gradient-text mb-6">E-Katalog Harga</h1>
      <p class="text-2xl text-gray-600 mb-4">Pilih template dan paket yang sesuai dengan budget Anda</p>
      <p class="text-lg text-gray-500">Dapatkan undangan digital yang indah dengan harga terjangkau</p>
    </div>

    <!-- Pricing Table -->
    <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl border border-gray-100 overflow-hidden mb-16 card-hover animate-slide-up">
      <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-8">
        <div class="text-center">
          <h2 class="text-3xl font-heading font-bold text-white mb-2">Harga Template</h2>
          <p class="text-white/80">Pilih template sesuai dengan gaya dan budget Anda</p>
        </div>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
            <tr>
              <th class="px-8 py-6 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Template</th>
              <th class="px-8 py-6 text-center text-sm font-bold text-gray-700 uppercase tracking-wider">Basic</th>
              <th class="px-8 py-6 text-center text-sm font-bold text-gray-700 uppercase tracking-wider">Premium</th>
              <th class="px-8 py-6 text-center text-sm font-bold text-gray-700 uppercase tracking-wider">Exclusive</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <!-- Classic Template -->
            <tr class="hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-300">
              <td class="px-8 py-8">
                <div class="flex items-center">
                  <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-heart text-white text-2xl"></i>
                  </div>
                  <div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Classic</h3>
                    <p class="text-gray-600">Desain klasik dengan sentuhan vintage yang elegan</p>
                  </div>
                </div>
              </td>
              <td class="px-8 py-8 text-center">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl p-4">
                  <div class="text-3xl font-bold">Rp 50.000</div>
                  <div class="text-sm opacity-80 mt-1">Template standar</div>
                </div>
              </td>
              <td class="px-8 py-8 text-center">
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl p-4">
                  <div class="text-3xl font-bold">Rp 100.000</div>
                  <div class="text-sm opacity-80 mt-1">Template premium</div>
                </div>
              </td>
              <td class="px-8 py-8 text-center">
                <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-xl p-4">
                  <div class="text-3xl font-bold">Rp 200.000</div>
                  <div class="text-sm opacity-80 mt-1">Custom desain</div>
                </div>
              </td>
            </tr>

            <!-- Modern Template -->
            <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
              <td class="px-8 py-8">
                <div class="flex items-center">
                  <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-gem text-white text-2xl"></i>
                  </div>
                  <div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Modern</h3>
                    <p class="text-gray-600">Desain modern minimalis yang clean dan stylish</p>
                  </div>
                </div>
              </td>
              <td class="px-8 py-8 text-center">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl p-4">
                  <div class="text-3xl font-bold">Rp 75.000</div>
                  <div class="text-sm opacity-80 mt-1">Template standar</div>
                </div>
              </td>
              <td class="px-8 py-8 text-center">
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl p-4">
                  <div class="text-3xl font-bold">Rp 125.000</div>
                  <div class="text-sm opacity-80 mt-1">Template premium</div>
                </div>
              </td>
              <td class="px-8 py-8 text-center">
                <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-xl p-4">
                  <div class="text-3xl font-bold">Rp 250.000</div>
                  <div class="text-sm opacity-80 mt-1">Custom desain</div>
                </div>
              </td>
            </tr>

            <!-- Luxury Template -->
            <tr class="hover:bg-gradient-to-r hover:from-yellow-50 hover:to-orange-50 transition-all duration-300">
              <td class="px-8 py-8">
                <div class="flex items-center">
                  <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-crown text-white text-2xl"></i>
                  </div>
                  <div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Luxury</h3>
                    <p class="text-gray-600">Desain mewah dengan aksen emas yang elegan</p>
                  </div>
                </div>
              </td>
              <td class="px-8 py-8 text-center">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl p-4">
                  <div class="text-3xl font-bold">Rp 100.000</div>
                  <div class="text-sm opacity-80 mt-1">Template standar</div>
                </div>
              </td>
              <td class="px-8 py-8 text-center">
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl p-4">
                  <div class="text-3xl font-bold">Rp 150.000</div>
                  <div class="text-sm opacity-80 mt-1">Template premium</div>
                </div>
              </td>
              <td class="px-8 py-8 text-center">
                <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-xl p-4">
                  <div class="text-3xl font-bold">Rp 300.000</div>
                  <div class="text-sm opacity-80 mt-1">Custom desain</div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Package Features -->
    <div class="grid md:grid-cols-3 gap-8 mb-16">
      <!-- Basic Package -->
      <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8 card-hover animate-slide-up">
        <div class="text-center mb-8">
          <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-star text-white text-3xl"></i>
          </div>
          <h3 class="text-3xl font-heading font-bold gradient-text mb-2">Paket Basic</h3>
          <p class="text-gray-600">Paket standar untuk undangan sederhana</p>
        </div>
        <ul class="space-y-4 mb-8">
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Template standar pilihan</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Custom nama & tanggal</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Masa aktif 1 tahun</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Dashboard client</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Responsive design</span>
          </li>
        </ul>
      </div>

      <!-- Premium Package -->
      <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border-4 border-yellow-400 p-8 card-hover animate-slide-up transform scale-105 relative" style="animation-delay: 0.1s;">
        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
          <div class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg">
            POPULAR
          </div>
        </div>
        <div class="text-center mb-8">
          <div class="w-20 h-20 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-crown text-white text-3xl"></i>
          </div>
          <h3 class="text-3xl font-heading font-bold gradient-text mb-2">Paket Premium</h3>
          <p class="text-gray-600">Paket terpopuler dengan fitur lengkap</p>
        </div>
        <ul class="space-y-4 mb-8">
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Template premium pilihan</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Custom lengkap (nama, tanggal, dll)</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Musik latar & animasi digital</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Fitur RSVP lengkap</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Galeri foto (max 5 foto)</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Masa aktif 1 tahun</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Dashboard client lengkap</span>
          </li>
        </ul>
      </div>

      <!-- Exclusive Package -->
      <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8 card-hover animate-slide-up" style="animation-delay: 0.2s;">
        <div class="text-center mb-8">
          <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-gem text-white text-3xl"></i>
          </div>
          <h3 class="text-3xl font-heading font-bold gradient-text mb-2">Paket Exclusive</h3>
          <p class="text-gray-600">Paket premium dengan custom desain</p>
        </div>
        <ul class="space-y-4 mb-8">
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Custom desain full sesuai keinginan</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Semua fitur premium</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Galeri foto unlimited</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Countdown timer</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Google Maps integration</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Masa aktif 1 tahun</span>
          </li>
          <li class="flex items-center">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <i class="fas fa-check text-green-500 text-sm"></i>
            </div>
            <span class="text-gray-700 font-medium">Revisi desain 3x</span>
          </li>
        </ul>
      </div>
    </div>

    <!-- Process Timeline -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-10 mb-16 card-hover animate-fade-in">
      <div class="text-center mb-12">
        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="fas fa-cogs text-white text-2xl"></i>
        </div>
        <h2 class="text-4xl font-heading font-bold gradient-text mb-4">Proses Pengerjaan</h2>
        <p class="text-xl text-gray-600">Langkah-langkah mudah untuk mendapatkan undangan digital Anda</p>
      </div>
      <div class="grid md:grid-cols-4 gap-8">
        <div class="text-center group">
          <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
            <span class="text-3xl font-bold text-white">1</span>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">Order & Pembayaran</h3>
          <p class="text-gray-600">Isi form pemesanan dan lakukan pembayaran</p>
        </div>
        <div class="text-center group">
          <div class="w-20 h-20 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
            <span class="text-3xl font-bold text-white">2</span>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">Pengerjaan</h3>
          <p class="text-gray-600">Tim kami akan mengerjakan undangan Anda (1-2 hari)</p>
        </div>
        <div class="text-center group">
          <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
            <span class="text-3xl font-bold text-white">3</span>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">Preview & Revisi</h3>
          <p class="text-gray-600">Undangan siap, Anda mendapat akses dashboard</p>
        </div>
        <div class="text-center group">
          <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
            <span class="text-3xl font-bold text-white">4</span>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">Publish</h3>
          <p class="text-gray-600">Undangan aktif dan siap dibagikan</p>
        </div>
      </div>
    </div>

    <!-- Add-on Section -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-10 mb-16 card-hover animate-fade-in">
      <div class="text-center mb-12">
        <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="fas fa-plus text-white text-2xl"></i>
        </div>
        <h2 class="text-4xl font-heading font-bold gradient-text mb-4">Fitur Add-on (Opsional)</h2>
        <p class="text-xl text-gray-600">Tambahkan fitur khusus sesuai kebutuhan acara Anda</p>
      </div>
      
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 border border-blue-200 card-hover">
          <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-clock text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Sistem Sesi</h3>
            <div class="text-3xl font-bold text-blue-600 mb-2">Rp 50.000</div>
          </div>
          <p class="text-gray-600 text-center">Bagi informasi undangan sampai 3 sesi</p>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 border border-green-200 card-hover">
          <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-qrcode text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Digital Guestbook</h3>
            <div class="text-3xl font-bold text-green-600 mb-2">Rp 150.000</div>
          </div>
          <p class="text-gray-600 text-center">QR Code unik untuk check-in otomatis</p>
        </div>

        <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl p-8 border border-yellow-200 card-hover">
          <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-edit text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Custom RSVP</h3>
            <div class="text-3xl font-bold text-yellow-600 mb-2">Rp 150.000</div>
          </div>
          <p class="text-gray-600 text-center">Penyesuaian RSVP dengan field tambahan</p>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 border border-purple-200 card-hover">
          <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-globe text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Custom Domain</h3>
            <div class="text-3xl font-bold text-purple-600 mb-2">Rp 250.000</div>
          </div>
          <p class="text-gray-600 text-center">Link undangan dengan domain sendiri</p>
        </div>

        <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl p-8 border border-indigo-200 card-hover">
          <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-language text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Multi Bahasa</h3>
            <div class="text-3xl font-bold text-indigo-600 mb-2">Rp 250.000</div>
          </div>
          <p class="text-gray-600 text-center">2 bahasa (+Rp 150K per bahasa)</p>
        </div>

        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl p-8 border border-pink-200 card-hover">
          <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fab fa-instagram text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Add Yours</h3>
            <div class="text-3xl font-bold text-pink-600 mb-2">Rp 50.000</div>
          </div>
          <p class="text-gray-600 text-center">Desain Add Yours Instagram</p>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="text-center mb-16">
      <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl p-12 text-white card-hover animate-fade-in">
        <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="fas fa-heart text-white text-3xl"></i>
        </div>
        <h2 class="text-5xl font-heading font-bold mb-6">Siap Memesan?</h2>
        <p class="text-2xl text-white/90 mb-10">Pilih template dan paket yang sesuai dengan kebutuhan Anda</p>
        <a href="order.php" class="btn-hover bg-white text-purple-600 px-12 py-4 rounded-full font-bold text-xl hover:bg-gray-100 transition-all duration-300 shadow-2xl inline-flex items-center">
          <i class="fas fa-shopping-cart mr-4 text-2xl"></i>
          Pesan Sekarang
        </a>
      </div>
    </div>

    <!-- Back to Home -->
    <div class="text-center">
      <a href="index.php" class="inline-flex items-center text-purple-600 hover:text-purple-800 font-semibold text-lg group transition-all duration-300">
        <i class="fas fa-arrow-left mr-3 group-hover:-translate-x-1 transition-transform"></i>
        Kembali ke Halaman Utama
      </a>
    </div>
  </div>

</body>
</html>
