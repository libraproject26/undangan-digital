<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Katalog Template - Undangan Digital</title>
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
            'slide-in-right': 'slideInRight 0.5s ease-out',
            'slide-in-left': 'slideInLeft 0.5s ease-out',
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
            },
            slideInRight: {
              '0%': { transform: 'translateX(100%)', opacity: '0' },
              '100%': { transform: 'translateX(0)', opacity: '1' },
            },
            slideInLeft: {
              '0%': { transform: 'translateX(-100%)', opacity: '0' },
              '100%': { transform: 'translateX(0)', opacity: '1' },
            }
          }
        }
      }
    }
  </script>
  <style>
    .gradient-text {
      background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #F59E0B 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .glassmorphism {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card-hover {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .slider-container {
      position: relative;
      overflow: hidden;
    }

    .slider-track {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slider-card {
      flex: 0 0 auto;
      width: 100%;
      max-width: 400px;
    }

    .bestseller-badge {
      position: absolute;
      top: -10px;
      right: -10px;
      background: linear-gradient(135deg, #F59E0B, #EF4444);
      color: white;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
      box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
      animation: pulse-slow 2s infinite;
    }

    .trending-badge {
      position: absolute;
      top: -10px;
      left: -10px;
      background: linear-gradient(135deg, #8B5CF6, #EC4899);
      color: white;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
      box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
      animation: pulse-slow 2s infinite;
    }

    .new-badge {
      position: absolute;
      top: -10px;
      left: -10px;
      background: linear-gradient(135deg, #10B981, #059669);
      color: white;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
      animation: pulse-slow 2s infinite;
    }

    html, body {
      overflow-x: hidden;
      overflow-y: auto;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-pink-50 font-body relative">
  
  <!-- Background Pattern -->
  <div class="absolute inset-0 opacity-5">
    <div class="absolute top-20 left-20 w-40 h-40 bg-purple-500 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-20 w-60 h-60 bg-pink-500 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full blur-3xl"></div>
  </div>

  <!-- Navigation -->
  <nav class="relative z-10 bg-white/90 backdrop-blur-sm shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-4">
        <div class="flex items-center">
          <a href="index.php" class="text-2xl font-heading font-bold gradient-text">
            <i class="fas fa-heart mr-2"></i>
            Undangan Digital
          </a>
        </div>
        <div class="hidden md:flex space-x-8">
          <a href="index.php" class="text-gray-700 hover:text-purple-600 font-medium transition">Beranda</a>
          <a href="catalog.php" class="text-purple-600 font-medium">E-Katalog</a>
          <a href="pricing.php" class="text-gray-700 hover:text-purple-600 font-medium transition">Harga</a>
          <a href="order.php" class="text-gray-700 hover:text-purple-600 font-medium transition">Order</a>
        </div>
        <div class="md:hidden">
          <button class="text-gray-700 hover:text-purple-600">
            <i class="fas fa-bars text-xl"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <div class="relative z-10 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <!-- Header -->
      <div class="text-center mb-16">
        <h1 class="text-5xl md:text-6xl font-heading font-bold gradient-text mb-6 animate-fade-in">
          E-Katalog Template
        </h1>
        <p class="text-xl text-gray-600 mb-8 animate-slide-up">
          Pilih template undangan digital yang sesuai dengan tema pernikahan Anda
        </p>
        <div class="flex flex-wrap justify-center gap-4">
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

      <!-- Recommendation Slider -->
      <div class="mb-16">
        <div class="flex items-center justify-between mb-8">
          <h2 class="text-3xl font-heading font-bold text-gray-800">
            <i class="fas fa-star text-yellow-500 mr-3"></i>
            Rekomendasi Kami
          </h2>
          <div class="flex space-x-2">
            <button onclick="prevSlide()" class="p-3 bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110">
              <i class="fas fa-chevron-left text-gray-600"></i>
            </button>
            <button onclick="nextSlide()" class="p-3 bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110">
              <i class="fas fa-chevron-right text-gray-600"></i>
            </button>
          </div>
        </div>
        
        <div class="slider-container">
          <div id="recommendationSlider" class="slider-track">
            <!-- Slide 1: Elegant -->
            <div class="slider-card px-4">
              <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover relative">
                <div class="new-badge">NEW</div>
                <div class="h-80 bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                  <div class="text-8xl">✨</div>
                </div>
                <div class="p-8">
                  <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Elegant</h3>
                  <p class="text-gray-600 mb-6">Desain elegan dengan gradien warna yang memukau. Cocok untuk pernikahan modern dengan nuansa romantis dan sophisticated.</p>
                  <div class="flex justify-between items-center mb-6">
                    <div class="text-2xl font-bold text-purple-600">Rp 75.000</div>
                    <div class="flex items-center text-yellow-500">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <span class="ml-2 text-gray-600 text-sm">(127)</span>
                    </div>
                  </div>
                  <div class="flex space-x-3">
                    <a href="invitation.php?slug=ahmad-sari-elegant" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-eye mr-2"></i>Preview
                    </a>
                    <a href="order.php?template=elegant" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-shopping-cart mr-2"></i>Order
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Slide 2: Luxury -->
            <div class="slider-card px-4">
              <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover relative">
                <div class="bestseller-badge">BESTSELLER</div>
                <div class="h-80 bg-gradient-to-br from-yellow-100 to-amber-100 flex items-center justify-center">
                  <div class="text-8xl">👑</div>
                </div>
                <div class="p-8">
                  <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Luxury</h3>
                  <p class="text-gray-600 mb-6">Desain mewah dengan aksen emas dan detail premium. Cocok untuk pernikahan eksklusif dengan nuansa glamour dan kemewahan.</p>
                  <div class="flex justify-between items-center mb-6">
                    <div class="text-2xl font-bold text-purple-600">Rp 100.000</div>
                    <div class="flex items-center text-yellow-500">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <span class="ml-2 text-gray-600 text-sm">(89)</span>
                    </div>
                  </div>
                  <div class="flex space-x-3">
                    <a href="invitation.php?slug=rizky-diana-luxury" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-eye mr-2"></i>Preview
                    </a>
                    <a href="order.php?template=luxury" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-shopping-cart mr-2"></i>Order
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Slide 3: Modern -->
            <div class="slider-card px-4">
              <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover relative">
                <div class="trending-badge">TRENDING</div>
                <div class="h-80 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                  <div class="text-8xl">💍</div>
                </div>
                <div class="p-8">
                  <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Modern</h3>
                  <p class="text-gray-600 mb-6">Desain modern minimalis dengan tipografi yang stylish. Cocok untuk pernikahan kontemporer dengan nuansa fresh dan elegan.</p>
                  <div class="flex justify-between items-center mb-6">
                    <div class="text-2xl font-bold text-purple-600">Rp 75.000</div>
                    <div class="flex items-center text-yellow-500">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <span class="ml-2 text-gray-600 text-sm">(156)</span>
                    </div>
                  </div>
                  <div class="flex space-x-3">
                    <a href="invitation.php?slug=ahmad-sari-modern" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-eye mr-2"></i>Preview
                    </a>
                    <a href="order.php?template=modern" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-shopping-cart mr-2"></i>Order
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Slide 4: Classic -->
            <div class="slider-card px-4">
              <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover relative">
                <div class="bestseller-badge">#1 TERLARIS</div>
                <div class="h-80 bg-gradient-to-br from-amber-100 to-orange-100 flex items-center justify-center">
                  <div class="text-8xl">💌</div>
                </div>
                <div class="p-8">
                  <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Classic</h3>
                  <p class="text-gray-600 mb-6">Desain klasik dengan sentuhan vintage yang elegan. Cocok untuk pernikahan tradisional dengan nuansa hangat dan romantis.</p>
                  <div class="flex justify-between items-center mb-6">
                    <div class="text-2xl font-bold text-purple-600">Rp 50.000</div>
                    <div class="flex items-center text-yellow-500">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <span class="ml-2 text-gray-600 text-sm">(234)</span>
                    </div>
                  </div>
                  <div class="flex space-x-3">
                    <a href="invitation.php?slug=ahmad-sari" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-eye mr-2"></i>Preview
                    </a>
                    <a href="order.php?template=classic" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-shopping-cart mr-2"></i>Order
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Slide 5: Minimalist -->
            <div class="slider-card px-4">
              <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover relative">
                <div class="new-badge">BUDGET FRIENDLY</div>
                <div class="h-80 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                  <div class="text-8xl">📄</div>
                </div>
                <div class="p-8">
                  <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Minimalist</h3>
                  <p class="text-gray-600 mb-6">Desain minimalis yang clean dan modern. Cocok untuk pernikahan dengan tema simple namun tetap elegan dan timeless.</p>
                  <div class="flex justify-between items-center mb-6">
                    <div class="text-2xl font-bold text-purple-600">Rp 40.000</div>
                    <div class="flex items-center text-yellow-500">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <span class="ml-2 text-gray-600 text-sm">(189)</span>
                    </div>
                  </div>
                  <div class="flex space-x-3">
                    <a href="invitation.php?slug=ahmad-sari-minimalist" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-eye mr-2"></i>Preview
                    </a>
                    <a href="order.php?template=minimalist" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-shopping-cart mr-2"></i>Order
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Slide 6: Vintage -->
            <div class="slider-card px-4">
              <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover relative">
                <div class="trending-badge">UNIQUE</div>
                <div class="h-80 bg-gradient-to-br from-amber-100 to-yellow-100 flex items-center justify-center">
                  <div class="text-8xl">🏛️</div>
                </div>
                <div class="p-8">
                  <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Vintage</h3>
                  <p class="text-gray-600 mb-6">Desain vintage dengan sentuhan klasik yang timeless. Cocok untuk pernikahan dengan tema retro dan nuansa hangat yang memukau.</p>
                  <div class="flex justify-between items-center mb-6">
                    <div class="text-2xl font-bold text-purple-600">Rp 60.000</div>
                    <div class="flex items-center text-yellow-500">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <span class="ml-2 text-gray-600 text-sm">(98)</span>
                    </div>
                  </div>
                  <div class="flex space-x-3">
                    <a href="invitation.php?slug=ahmad-sari-vintage" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-eye mr-2"></i>Preview
                    </a>
                    <a href="order.php?template=vintage" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                      <i class="fas fa-shopping-cart mr-2"></i>Order
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bestseller Section -->
      <div class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-heading font-bold text-gray-800 mb-4">
            <i class="fas fa-trophy text-yellow-500 mr-3"></i>
            Template Terlaris
          </h2>
          <p class="text-gray-600">Template yang paling banyak dipilih oleh customer kami</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Classic - Most Popular -->
          <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover relative animate-fade-in">
            <div class="bestseller-badge">#1 TERLARIS</div>
            <div class="h-64 bg-gradient-to-br from-amber-100 to-orange-100 flex items-center justify-center">
              <div class="text-8xl">💌</div>
            </div>
            <div class="p-8">
              <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Classic</h3>
              <p class="text-gray-600 mb-6">Desain klasik dengan sentuhan vintage yang elegan. Cocok untuk pernikahan tradisional dengan nuansa hangat dan romantis.</p>
              <div class="flex justify-between items-center mb-6">
                <div class="text-2xl font-bold text-purple-600">Rp 50.000</div>
                <div class="flex items-center text-yellow-500">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span class="ml-2 text-gray-600 text-sm">(234)</span>
                </div>
              </div>
              <div class="flex space-x-3">
                <a href="invitation.php?slug=ahmad-sari" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                  <i class="fas fa-eye mr-2"></i>Preview
                </a>
                <a href="order.php?template=classic" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                  <i class="fas fa-shopping-cart mr-2"></i>Order
                </a>
              </div>
            </div>
          </div>

          <!-- Minimalist - Budget Friendly -->
          <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover relative animate-fade-in">
            <div class="trending-badge">BUDGET FRIENDLY</div>
            <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
              <div class="text-8xl">📄</div>
            </div>
            <div class="p-8">
              <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Minimalist</h3>
              <p class="text-gray-600 mb-6">Desain minimalis yang clean dan modern. Cocok untuk pernikahan dengan tema simple namun tetap elegan dan timeless.</p>
              <div class="flex justify-between items-center mb-6">
                <div class="text-2xl font-bold text-purple-600">Rp 40.000</div>
                <div class="flex items-center text-yellow-500">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span class="ml-2 text-gray-600 text-sm">(189)</span>
                </div>
              </div>
              <div class="flex space-x-3">
                <a href="invitation.php?slug=ahmad-sari&template=minimalist" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                  <i class="fas fa-eye mr-2"></i>Preview
                </a>
                <a href="order.php?template=minimalist" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                  <i class="fas fa-shopping-cart mr-2"></i>Order
                </a>
              </div>
            </div>
          </div>

          <!-- Vintage - Unique -->
          <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover relative animate-fade-in">
            <div class="new-badge">UNIQUE</div>
            <div class="h-64 bg-gradient-to-br from-amber-100 to-yellow-100 flex items-center justify-center">
              <div class="text-8xl">🏛️</div>
            </div>
            <div class="p-8">
              <h3 class="text-2xl font-heading font-bold text-gray-800 mb-3">Vintage</h3>
              <p class="text-gray-600 mb-6">Desain vintage dengan sentuhan klasik yang timeless. Cocok untuk pernikahan dengan tema retro dan nuansa hangat yang memukau.</p>
              <div class="flex justify-between items-center mb-6">
                <div class="text-2xl font-bold text-purple-600">Rp 60.000</div>
                <div class="flex items-center text-yellow-500">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span class="ml-2 text-gray-600 text-sm">(98)</span>
                </div>
              </div>
              <div class="flex space-x-3">
                <a href="invitation.php?slug=ahmad-sari&template=vintage" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold text-center transition">
                  <i class="fas fa-eye mr-2"></i>Preview
                </a>
                <a href="order.php?template=vintage" class="flex-1 bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-semibold text-center transition">
                  <i class="fas fa-shopping-cart mr-2"></i>Order
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- View All Templates -->
      <div class="text-center mb-16">
        <h2 class="text-3xl font-heading font-bold text-gray-800 mb-4">
          <i class="fas fa-th-large text-purple-600 mr-3"></i>
          Lihat Semua Template
        </h2>
        <p class="text-gray-600 mb-8">Jelajahi koleksi lengkap template undangan digital kami</p>
        <a href="templates/index.php" class="inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-full font-semibold text-lg hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
          <i class="fas fa-grid-3x3 mr-3"></i>
          Lihat Semua Template
          <i class="fas fa-arrow-right ml-3"></i>
        </a>
      </div>

      <!-- Features -->
      <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 mb-16">
        <h2 class="text-3xl font-heading font-bold text-center text-gray-800 mb-12">
          Mengapa Memilih Template Kami?
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
          <div class="text-center">
            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-mobile-alt text-purple-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Responsive Design</h3>
            <p class="text-gray-600">Tampil sempurna di semua device dan ukuran layar</p>
          </div>
          
          <div class="text-center">
            <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-palette text-pink-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Customizable</h3>
            <p class="text-gray-600">Dapat disesuaikan dengan tema dan warna pernikahan Anda</p>
          </div>
          
          <div class="text-center">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-rocket text-blue-600 text-2xl"></i>
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
        <a href="order.php" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:from-pink-600 hover:to-purple-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
          <i class="fas fa-shopping-cart mr-3"></i>
          Mulai Order Sekarang
        </a>
      </div>
    </div>
  </div>

  <!-- Back to Home -->
  <div class="text-center mt-8 pb-8">
    <a href="index.php" class="text-purple-600 hover:text-purple-800 font-medium">
      <i class="fas fa-arrow-left mr-2"></i>Kembali ke Halaman Utama
    </a>
  </div>

  <script>
    let currentSlide = 0;
    const totalSlides = 6; // Total 6 slides sekarang

    function nextSlide() {
      currentSlide = (currentSlide + 1) % totalSlides;
      updateSlider();
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
      updateSlider();
    }

    function updateSlider() {
      const slider = document.getElementById('recommendationSlider');
      const translateX = -currentSlide * 100;
      slider.style.transform = `translateX(${translateX}%)`;
    }

    // Initialize slider
    document.addEventListener('DOMContentLoaded', function() {
      updateSlider();
    });
  </script>
</body>
</html>
